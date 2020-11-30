<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ReportReceivables;
use App\ReportProlongation;

class OracleController extends Controller
{
    public function execute($sql){
        $query = DB::connection('oracle')
            ->select($sql);
        return $query;
    }

public function getProlongation()
    {
        ini_set('max_execution_time', -1);
        $sql = "select
  vp.OldAgrISN,
  vp.OldAgrProdISN,
  vp.clientisn,
  vp.NewAgrISN,
  vp.NewDeptISN,
  (select isn
   from subdept d
    where parentisn = 1000
   start with isn = NewDeptISN
   connect by prior parentisn=isn) NewMainDeptISN,
  vp.NewAgentISN,

  vp.OldAgrID,
  vp.oldagrprodname,
  vp.ClientFullName,
  vp.ClientJurISN,
  vp.OldDateEnd,
  vp.OldInsPremium,
  vp.NewAgrId,
  vp.NewDateSign,
  vp.NewInsPremium,
  vp.NewDeptName,
  vp.NewMainDeptName,
  vp.NewAgentShortName
from centras_prolongation_v1 vp
     join (select isn
        from subdept d
      start with isn = :pDept1ISN
      connect by prior isn=parentisn ) sd on vp.OldDeptISN = sd.ISN

where &mSign
      &mBeg
      &mEnd
      &mEmplWhere
      &mJur
      &mAgrProduct
      &mAgrClass
      &mAgreement";
        $startTime = time();
        $AgrISN = null;
        $DeptISN = 1000;
        $EmplISN = null;
        $ProductISN = null;
        $AgrClass = null;
        $RoleClass = null;
        $RoleSubj = null;
        $Jur = null;
        $Date1 = "to_date('01.11.2020', 'dd.mm.yyyy')";
        $DateSign1 = null;
        $DateSign2 = null;
        $DateBeg1  = null;
        $DateBeg2  = null;
        $DateEnd1  =  "to_date('01.11.2020', 'dd.mm.yyyy')";
        $DateEnd2  =  "to_date('30.11.2020', 'dd.mm.yyyy')";
        $CheckDept = null;


        #Обязательно
        $sql = str_replace(':pDate1', $Date1, $sql); #Отчетная дата:
        $sql = str_replace(':pDept1ISN', $DeptISN, $sql); #Департамент
        #на выбор
        $sql = str_replace('&mAgreement', $AgrISN != null ? "and a.isn = $AgrISN" : "", $sql); #Договор
        $sql = str_replace('&mEmplWhere', $EmplISN != null ? "and a.EmplISN = $EmplISN" : "", $sql); #Сотрудник
        $sql = str_replace('&mAgrClass', $AgrClass != null ? "and a.classisn in (select isn  from dicti start with ISN = $AgrClass connect by prior isn = parentisn)" : "", $sql); #Тип договора. Справочник 2110
        $sql = str_replace('&mAgrProduct', $ProductISN != null ? "and a.ProductISN in (select isn from dicti start with isn=$ProductISN connect by prior isn=parentisn)" : "", $sql); # Продукт. Справочник 13
        $sql = str_replace('&mRole', $RoleClass != null ? "and exists (select 1 from agrrole ar where ar.AgrISN=a.ISN and ar.subjisn = $RoleSubj and ar.classisn = $RoleClass)" : "", $sql); #
        $sql = str_replace('&mJur', $Jur != null ? "and subj_utils.GetSubjJur(a.clientisn) in ($Jur)" : "", $sql); #
        $sql = str_replace('&mSign', $DateSign1 != null ? "and a.datesign between $DateSign1 and $DateSign2" : "", $sql); #
        $sql = str_replace('&mBeg',  ($DateBeg1 != null && $DateBeg2 != null) ? "and a.datebeg between $DateBeg1 and $DateBeg2" : "", $sql); #
        $sql = str_replace('&mEnd',  $DateEnd1 != null ? " vp.OldDateEnd between $DateEnd1 and $DateEnd2" : "", $sql); #
        $sql = str_replace('&mCheckDept',  $CheckDept != null ? " and a.DeptISN not in (select isn from subdept start with isn in (2000) connect by prior isn = parentisn)" : "", $sql); #

       //dd($sql);
        $result = $this->execute($sql);
        $i=0;
        $sum = 0;
        ReportProlongation::query()->truncate();
        foreach ($result as $v) {
          $i++;

          $nowtime = time();
          $workTime = $nowtime - $startTime;
          try {
            $RP = new ReportProlongation;
              $RP->oldAgrISN = intval($v->oldagrisn);
              $RP->oldAgrProdISN = intval($v->oldagrprodisn);
              $RP->clientISN = intval($v->clientisn);
              $RP->newAgrISN = intval($v->newagrisn);
              $RP->newDeptISN = intval($v->newdeptisn);
              $RP->newMainDeptISN = intval($v->newmaindeptisn);
              $RP->newAgentISN = intval($v->newagentisn);
              $RP->oldAgrID = $v->oldagrid;
              $RP->newAgrID = $v->newagrid;
              $RP->clientFullName = $v->clientfullname;
              $RP->oldAgrProdName = $v->oldagrprodname;
              //$RP->clientName = $v->clientname;
              $RP->jur =$v->clientjurisn;
              $RP->newDateSign = $v->newdatesign;
              $RP->oldDateEnd = $v->olddateend;
              //$RP->agrDateBeg = $v->agrdatebeg;
              $RP->oldInsPremium = intval($v->oldInsPremium);
              $RP->newInsPremium = intval($v->newinspremium);
              $RP->newDeptName = $v->newdeptname;
              $RP->newMainDeptName = $v->newmaindeptname;
              $RP->newAgentShortName = $v->newagentshortname;
            $RP->save();
          } catch (\Exception $e) {
            print '<b>'.var_dump($v).'</b> <br /> <hr />';
            print $e;
            break;
          }


        }
        print"<h1>Общая сумма Пролонгаций: $sum</h1>";
        print"<h1>Время работы: $workTime</h1>";
        // return view('oracle.DZnewGani')
        //             ->with('result', $result)
        //             ->with('startTime', $startTime);
        $nowtime = time();
        $workTime = $nowtime - $startTime;
        print $workTime;
      }

    public function getReceivables(){

        $sql = 'select
    A4 as colnum1, sum(B4) as colnum2, sum(C4) as colnum3, sum(D4) as colnum4, sum(E4) as colnum5, sum(F4) as colnum6, sum(G4) as colnum7, -- АП
                   sum(H4) as colnum8, sum(I4) as colnum9, sum(J4) as colnum10, sum(K4) as colnum11, sum(L4) as colnum12, sum(M4) as colnum13,
                   sum(N4) as colnum14, sum(O4) as colnum15, sum(P4) as colnum16, sum(Q4) as colnum17, sum(R4) as colnum18, sum(S4) as colnum19,

    A4 as colnum21, sum(V4) as colnum22, sum(W4) as colnum23, sum(X4) as colnum24, -- КИАС

    A4 as colnum26, sum(AA4) as colnum27, sum(AB4) as colnum28, sum(AC4) as colnum29, -- Купиполис
                    sum(AD4) as colnum30, sum(AE4) as colnum31, sum(AF4) as colnum32, sum(AG4) as colnum33, -- Купиполис
                    sum(AH4) as colnum34, sum(AI4) as colnum35, sum(AJ4) as colnum36, sum(AK4) as colnum37,
                    sum(AL4) as colnum38, sum(AM4) as colnum39, sum(AN4) as colnum40, sum(AO4) as colnum41,    sum(AP4) as colnum42
from (
  select a.datesign as A4,
  ------------АП------------------
         Case when a.productisn = 471391 then count(distinct a.id) end as B4,
         Case when a.productisn = 474111 then count(distinct a.id) end as C4,
         Case when a.productisn = 501271 then count(distinct a.id) end as D4,
         Case when a.productisn = 471441 then count(distinct a.id) end as E4,
         Case when a.productisn = 471571 then count(distinct a.id) end as F4,
         Case when a.productisn = 474421 then count(distinct a.id) end as G4,
         Case when a.productisn = 751981 then count(distinct a.id) end as H4,
         Case when a.productisn = 475361 then count(distinct a.id) end as I4,
         Case when a.productisn = 471401 then count(distinct a.id) end as J4,
         Case when a.productisn = 474131 then count(distinct a.id) end as K4,
         Case when a.productisn = 670181 then count(distinct a.id) end as L4,
         Case when a.productisn = 473861 then count(distinct a.id) end as M4,
         Case when a.productisn = 474941 then count(distinct a.id) end as N4,

         0 as O4,
         0 as P4,
         0 as Q4,
         0 as R4,
         0 as S4,
  ------------KIAS----------------
         0 as V4,
         0 as W4,
         0 as X4,
  ------------Kupipolis-----------
         0 as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4
  from Agreement a
  where a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
        and a.status in (\'В\',\'Д\')
        --and a.productisn <> 221711
        and a.systemisn = 500381
  group by a.datesign, a.productisn

union all

  select a.datesign as A4,
  ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         count(distinct a.id) as O4,
         0 as P4,
         0 as Q4,
         0 as R4,
         0 as S4,
  ------------KIAS----------------
         0 as V4,
         0 as W4,
         0 as X4,
  ------------Kupipolis-----------
         0 as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4


  from Agreement a
  join Subject s on s.isn = a.clientisn and s.juridical = \'Y\'
  join AgrObject o on o.agrisn = a.isn
  join AgrObjCar c on c.isn = o.isn and c.territoryisn = 172834
  where a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
        and a.status in (\'В\',\'Д\')
        and a.systemisn = 500381
        and a.productisn = 221711
  group by a.datesign

  union all

  select  a.datesign as A4,
  ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         0 as O4,
         count(distinct a.id) as P4,
         0 as Q4,
         0 as R4,
         0 as S4,
  ------------KIAS----------------
         0 as V4,
         0 as W4,
         0 as X4,
  ------------Kupipolis-----------
         0 as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4

  from Agreement a
  join Subject s on s.isn = a.clientisn and s.juridical = \'N\'
  join AgrObject o on o.agrisn = a.isn
  join AgrObjCar c on c.isn = o.isn and c.territoryisn = 172834
  where a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
       and a.status in (\'В\',\'Д\')
       and a.systemisn = 500381
       and a.productisn = 221711
  group by a.datesign

union all

  select  a.datesign as A4,
  ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         0 as O4,
         0 as P4,
         count(distinct a.id) as Q4,
         0 as R4,
         0 as S4,
  ------------KIAS----------------
         0 as V4,
         0 as W4,
         0 as X4,
  ------------Kupipolis-----------
         0 as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4

  from Agreement a
  join Subject s on s.isn = a.clientisn and s.juridical = \'Y\'
  join AgrObject o on o.agrisn = a.isn
  join AgrObjCar c on c.isn = o.isn and c.territoryisn <> 172834
  where a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
      and a.status in (\'В\',\'Д\')
      and a.systemisn = 500381
      and a.productisn = 221711
  group by a.datesign


  union all

  select  a.datesign as A4,
  ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         0 as O4,
         0 as P4,
         0 as Q4,
         count(distinct a.id) as R4,
         0 as S4,
  ------------KIAS----------------
         0 as V4,
         0 as W4,
         0 as X4,
  ------------Kupipolis-----------
         0 as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4

  from Agreement a
  join Subject s on s.isn = a.clientisn and s.juridical = \'N\'
  join AgrObject o on o.agrisn = a.isn
  join AgrObjCar c on c.isn = o.isn and c.territoryisn <> 172834
  where a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
      and a.status in (\'В\',\'Д\')
      and a.systemisn = 500381
      and a.productisn = 221711
  group by a.datesign

union all

 select a.datesign as A4,
 ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         0 as O4,
         0 as P4,
         0 as Q4,
         0 as R4,
         count(distinct a.id) as S4,
  ------------KIAS----------------
         0 as V4,
         0 as W4,
         0 as X4,
  ------------Kupipolis-----------
         0 as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4
  from Agreement a
  where a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
        and a.status in (\'В\',\'Д\')
        and a.productisn = 221711
        and a.systemisn = 500381
        and nvl(Attr_Utils.GetAddAttrN(cnt.isn(\'cKiasObjAgreement\'),cnt.userisn(\'cGBDEsbdChedk\'),a.isn),0) > 0
  group by a.datesign

union all
------------KIAS----------------

 select a.datesign as A4,
 ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         0 as O4,
         0 as P4,
         0 as Q4,
         0 as R4,
         0 as S4,
  ------------KIAS----------------
         count(distinct a.id) as V4,
         0 as W4,
         0 as X4,
  ------------Kupipolis-----------
         0 as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4

  from Agreement a
  where a.status in (\'В\',\'Д\')
      and a.systemisn = 221390
      and a.productisn <> 221711
      and a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
  group by a.datesign


  union all

  select a.datesign as A4,
  ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         0 as O4,
         0 as P4,
         0 as Q4,
         0 as R4,
         0 as S4,
  ------------KIAS----------------
         0 as V4,
         count(distinct a.id) as W4,
         0 as X4,
  ------------Kupipolis-----------
         0 as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4

  from Agreement a
  where a.status in (\'В\',\'Д\')
      and a.systemisn = 221390
      and a.productisn = 221711
      and a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
  group by a.datesign

union all

  select a.datesign as A4,
  ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         0 as O4,
         0 as P4,
         0 as Q4,
         0 as R4,
         0 as S4,
  ------------KIAS----------------
         0 as V4,
         0 as W4,
         count(distinct a.id) as X4,
  ------------Kupipolis-----------
         0 as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4
  from Agreement a
  join Docs d on d.classisn = 839881
  join Docrow dr on dr.docisn = d.isn and dr.valn1 = a.isn
  where a.status in (\'В\',\'Д\')
      and a.systemisn = 221390
      and a.productisn = 221711
      and a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
  group by a.datesign

union all

------------Купиполис------------------
  select a.datesign as A4,
  ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         0 as O4,
         0 as P4,
         0 as Q4,
         0 as R4,
         0 as S4,
  ------------KIAS----------------
         0 as V4,
         0 as W4,
         0 as X4,
  ------------Kupipolis-----------
         count(distinct a.id) as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4

  from Agreement a
  where a.status in (\'В\',\'Д\')
      and a.systemisn = 515431
      and a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
      and exists (Select 1 from Agrrole ar where ar.classisn = 18890 -- оператор ввода
                                                 and ar.agrisn = a.isn
                                                 and ar.subjisn = 3144429 -- Портал Купиполис
                 )
  group by a.datesign


  union all

  Select a.datesign as A4,
  ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         0 as O4,
         0 as P4,
         0 as Q4,
         0 as R4,
         0 as S4,
  ------------KIAS----------------
         0 as V4,
         0 as W4,
         0 as X4,
  ------------Kupipolis-----------
         0 as AA4,
         Case when a.productisn = 221711 then count(distinct a.id) end as AB4,
         Case when a.productisn = 471391 then count(distinct a.id) end as AC4,
         Case when a.productisn = 474941 then count(distinct a.id) end as AD4,
         Case when a.productisn = 474931 then count(distinct a.id) end as AE4,
         Case when a.productisn = 474111 then count(distinct a.id) end as AF4,
         Case when a.productisn = 821031 then count(distinct a.id) end as AG4,
         Case when a.productisn = 862261 then count(distinct a.id) end as AH4,
         Case when a.productisn = 512991 then count(distinct a.id) end as AI4,
         Case when a.productisn = 471571 then count(distinct a.id) end as AJ4,
         Case when a.productisn = 473861 then count(distinct a.id) end as AK4,   -- 512991 471571 473861
         Case when a.productisn = 482671 then count(distinct a.id) end as AL4,
         Case when a.productisn = 854501 then count(distinct a.id) end as AM4,
         Case when a.productisn = 811191 then count(distinct a.id) end as AN4,
         Case when a.productisn = 738691 then count(distinct a.id) end as AO4,
         Case when a.productisn = 518201 then count(distinct a.id) end as AP4

  from Agreement a
  join Dicti di on di.isn = a.productisn
  where a.status in (\'В\',\'Д\')
      and a.systemisn = 515431
     -- and a.productisn <> 221711
      and a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
      and exists (Select 1 from Agrrole ar
                            join agreement aa on aa.isn = a.isn where ar.classisn = 18890 -- оператор ввода
                                                 and ar.agrisn = a.isn
                                                 and ar.subjisn = 3990862
                                                 --and (ar.subjisn <> 3144429/* or (aa.productisn = 482671 and ar.subjisn = 3144429)*/)-- Портал Купиполис
                 )
     -- and a.emplisn in (3601487)
     --and a.productisn = 821031
 Group by a.emplisn,a.productisn,di.Fullname,a.datesign

  union all

  select a.datesign as A4,
  ------------АП------------------
         0 as B4,
         0 as C4,
         0 as D4,
         0 as E4,
         0 as F4,
         0 as G4,
         0 as H4,
         0 as I4,
         0 as J4,
         0 as K4,
         0 as L4,
         0 as M4,
         0 as N4,
         0 as O4,
         0 as P4,
         0 as Q4,
         0 as R4,
         0 as S4,
  ------------KIAS----------------
         0 as V4,
         0 as W4,
         0 as X4,
  ------------Kupipolis-----------
         0 as AA4,
         0 as AB4,
         0 as AC4,
         0 as AD4,
         0 as AE4,
         0 as AF4,
         0 as AG4,
         0 as AH4,
         0 as AI4,
         0 as AJ4,
         0 as AK4,
         0 as AL4,
         0 as AM4,
         0 as AN4,
         0 as AO4,
         0 as AP4
  from agreement a
  where a.datesign between to_date(\'01.03.2020\', \'dd.mm.yyyy\') and trunc(sysdate)
        and a.status in (\'В\')
        and a.productisn = 221711
  Group by a.datesign
)
group by A4
order by A4 desc';
        $startTime = time( );
        $result = $this->execute($sql);
        return view('oracle.test')->with('result', $result)->with('startTime', $startTime);
    }

    public function subject(){
        ini_set('max_execution_time', -1);
        //\Illuminate\Support\Facades\DB::connection('oracle')::setDateFormat('MM/DD/YYYY');
        $a = \Illuminate\Support\Facades\DB::connection('oracle')->select('select * from subject where isn in (3921599, 3600338)');
        dd($a);
    }

    public function DZnewGani()
    {
        ini_set('max_execution_time', -1);
        $sql = "with
  D1 as ( select distinct j.isn
            from Employee e, Subject j, SubHuman h, ECareer ec, SubDept dd, Estaff f
           where e.ISN = j.ISN
             and e.ISN = h.ISN
             and j.ISN = ec.EmplISN
             and sysdate between ec.DateBeg and nvl(ec.DateEnd,sysdate)
             and ec.StaffISN = f.ISN
             and f.DeptISN   = dd.ISN
             and decode(nvl(dd.ClassISN,0),cnt.isn('empDeptBusiness'),cnt.NumCode('SystemBossDept'),dd.isn)
                 in (select isn from SubDept connect by prior isn = parentisn start with isn = 1445780)
        ),

  AgrType as (select dd.isn from dicti dd  connect by prior dd.isn = dd.parentisn start with dd.isn in (cnt.isn('AgrDirect'),cnt.ISN('ReAgrIn'))),

  Agr as ( select
             t.Agrisn     as Agrisn,
             t.insclassisn     as insclassisn,
             a.CROSSISN   as AgrCrossIsn,
             a.id         as Agrid,
             agr_utils.GetAgrStatus(a.status) as AgrStatus,
             a.clientisn  as AgrClient,
             a.classisn   as ClassISN,
             a.productisn as ProductISN,
             a.datesign   as AgrSign,
             a.datebeg    as AgrBeg,
             nvl(a.datedenounce,a.dateend) as AgrEnd,
             a.created    as AgrCreated,
             a.emplisn    as AgrEmpl,
             a.deptisn    as AgrDep,
             agr_utils.GetAgrClauses(a.isn, cnt.ISN('cSaleChannel'))   SaleChannel,
             t.scheduleCount as obgG,
             t.premium    as amountP,
             t.payment    as amountF,
             t.schedule   as amountG,
             t.DZ         as dz,
             t.DZ1_12     as dz1_12

  from ( select
           agrisn,
           insclassisn,
           sum (premium) as premium,
           sum (payment) as payment,
           sum (amount)  as DZ,
           round(sum (premium)/12) as DZ1_12,
           sum(schedule) as schedule,
           sum(scheduleCount) as scheduleCount

           from ( -- Обороты по договору
                  select
                    sb.agrisn,
                    sb.insclassisn,
                    case
                      /*when sb.debet  = '1280.42'and sb.credit = '1280.42' and sb.debetsubjisn <> sb.creditsubjisn then 0 -- входящее переброс остатков
                      when sb.debet  in ('1280.41', '1280.42') then sb.amount
                      when sb.credit in ('1280.41', '1280.42') then -sb.amount
                      when sb.credit in ('1280.42', '1280.42') then -sb.amount*/
                      when sb.debet  = '1280.42' and sb.credit = '1280.42' and sb.debetsubjisn <> sb.creditsubjisn then 0
                      when sb.debet  in ('1280.41', '1280.42') and sb.debetsubjisn = sb.creditsubjisn then sb.amount
                      when sb.credit in ('1280.41', '1280.42') and sb.debetsubjisn = sb.creditsubjisn then -sb.amount
                      when sb.debet  in ('1280.41', '1280.42') and sb.debetsubjisn <> sb.creditsubjisn then sb.amount
                      when sb.credit  in ('1280.41', '1280.42') and sb.debetsubjisn <> sb.creditsubjisn then -sb.amount
                    end as amount,
                    0 as Premium,
                    0 as Payment,
                    0 as schedule,
                    0 as scheduleCount
                    from AGRSUMBUH sb
                    --join AgrSum s on s.isn = sb.agrsumisn
                   where sb.datepay <= (:pDate1-1)--to_date('01.02.2018','dd.mm.yyyy')
                     --and  sb.deptisn = 1445805
                     and (sb.debet in ('1280.41', '1280.42') or sb.credit  in ('1280.41', '1280.42'))
                     -- and sb.agrisn = 2185942--2167138--2167220--1688862
                  -- Полученная премия
                  union all
                  select
                    sb.agrisn,
                    sb.insclassisn,
                    0 as amount,
                    case
                      when sb.debet  in ('1280.41', '1280.42') and sb.credit  in ('6280.41.1', '6280.41.2') then  sb.amount
                      when sb.credit in ('1280.41', '1280.42') and sb.debet   in ('6280.41.1', '6280.41.2') then -sb.amount
                      when sb.credit in ('1280.42') and sb.debet   in ('1280.42') then -sb.amount
                      when sb.debet  in ('7470.40.2')          and sb.credit  in ('1280.41')                then -sb.amount
                      when sb.credit in ('7470.40.2')          and sb.debet   in ('1280.41')                then  sb.amount
                      when sb.debet  in ('1280.41', '1280.42') and sb.credit  in ('6250.02')                 then -sb.amount
                      when sb.debet  in ('7470.40.3')          and sb.credit  in ('3390.43.2')               then -sb.amount
                      when sb.credit in ('7470.40.3')          and sb.debet   in ('3390.43.2')               then sb.amount
                    end as Premium,
                    0 as Payment,
                    0 as schedule,
                    0 as scheduleCount

                    from AGRSUMBUH sb
                    --join AgrSum s on s.isn = sb.agrsumisn
                   where sb.datepay <= (:pDate1-1)--to_date('01.02.2018','dd.mm.yyyy')
                     --and  sb.deptisn = 1445805
                     and ((sb.debet in ('1280.41', '1280.42') and sb.credit  in ('6280.41.1','6280.41.2')) or
                         (sb.debet in ('1280.41', '1280.42') and sb.credit  in ('3510.41','3510.42')) or
                         (sb.debet in ('1280.41', '1280.42') and sb.credit  in ('3390.41','3390.42')) or
                           ( sb.credit in ('1280.42') and sb.debet   in ('1280.42') )or
                         (sb.debet in ('1280.41', '1280.42') and sb.credit  in ('6250.02')) or
                         (sb.debet in ('7430.02') and sb.credit  in ('1280.41', '1280.42')) or
                         (sb.debet in ('6280.41.1','6280.41.2') and sb.credit in ('1280.41', '1280.42')) or
                         (sb.debet in ('7470.40.2') and sb.credit in ('1280.41')) or
                         (sb.debet in ('7470.40.3') and sb.credit in ('3390.43.2')) or
                         (sb.debet in ('1280.41')   and sb.credit in ('7470.40.2')) or
                         --(sb.debet in ('3390.42')   and sb.credit in ('1280.41','1280.42')) or
                         (sb.debet in ('3390.43.2') and sb.credit in ('7470.40.3')))
                  -- Фактическая оплата
                  union all
                  select
                    sb.agrisn,
                    sb.insclassisn,
                    0 as amount,
                    0 as Premium,
                    case
                      when sb.debet in ('3510.41','3510.42') and sb.credit in ('1280.41', '1280.42') then sb.amount
                      when sb.debet in ('1280.41','1280.42') and sb.credit in ('3510.41','3510.42')  then - sb.amount
                      when sb.credit in ('1280.42') and sb.debet   in ('1280.42') then -sb.amount
                      when sb.debet in ('3520.01') and sb.credit in ('1280.41','1280.42')   then sb.amount
                      when sb.debet in ('1280.41','1280.42') and sb.credit in ('3520.01')   then -sb.amount
                      when sb.debet in ('3390.42')   and sb.credit in ('1280.41','1280.42') then sb.amount
                      when sb.debet in ('1280.41','1280.42') and sb.credit in ('3390.42')   then -sb.amount
                    end as Payment,
                    0 as schedule,
                    0 as scheduleCount

                    from AGRSUMBUH sb
                    --join AgrSum s on s.isn = sb.agrsumisn
                   where sb.datepay <= (:pDate1-1)--to_date('01.02.2018','dd.mm.yyyy')
                     --and  sb.deptisn = 1445805
                     and ((sb.debet in ('3510.41','3510.42') and sb.credit in ('1280.41', '1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3510.41','3510.42')) or
                         (sb.credit in ('1280.42') and sb.debet   in ('1280.42'))or
                         (sb.debet in ('3520.01') and sb.credit in ('1280.41','1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3520.01')) or
                         (sb.debet in ('3390.42')   and sb.credit in ('1280.41','1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3390.42')))

                  -- Остаток на начало периода
                  union all
                  select sa.agrisn,
                    sa.insclassisn,
                    sum(sa.amountdebet) as debit,
                    sum(sa.amountdebet) as Premium,
                    0 as Payment,
                    0 as schedule,
                    0 as scheduleCount
                    from accsaldo sa
                   where sa.periodisn = 201701
                     and sa.accisn in(485591,485601)
                     --and sa.deptisn = 1445805
                     -- and sa.agrisn = 2185942--2167138--2167220--1688862
                  group by sa.periodisn, sa.datebeg,sa.deptisn, sa.subjisn,sa.insclassisn, sa.agrisn

                  -- График платежей
                  union all
                  select
                    s.agrisn,
                    c.insclassisn,
                    0 as debit,
                    0 as Premium,
                    0 as Payment,
                    sum(s.amount) as schedule,
                    count (distinct s.datepay) as scheduleCount
                    from agrsum s
                    join agrcond c on c.isn = s.condisn
                   where s.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                     and s.discr ='G'
                     and s.acc = 'B'
                  group by s.agrisn, c.insclassisn
                ) group by agrisn, insclassisn
         )  t
  join Agreement a on a.isn = t.agrisn
        join (select distinct ssd.isn
                from subdept ssd
                start with ssd.isn in( nvl(:pDept1ISN, 1000),
                                       (select 1445766
                                          from subdept sd
                                         where sd.isn = 4100260
                                        start with sd.isn = nvl(:pDept1ISN, 1000)
                                        connect by prior sd.isn = sd.parentisn),
                                       (select 1445826
                                          from subdept sd
                                         where sd.isn = 2000
                                        start with sd.isn = nvl(:pDept1ISN, 1000)
                                        connect by prior sd.isn = sd.parentisn),
                                       (select 1445824
                                          from subdept sd
                                         where sd.isn = 2000
                                         start with sd.isn = nvl(:pDept1ISN, 1000)
                                         connect by prior sd.isn = sd.parentisn) )
                  connect by prior ssd.isn = ssd.parentisn ) sd on a.DeptISN = sd.ISN
         where t.DZ <>0
   and  a.classisn in (select * from AgrType)
   and rownum < 1000
                               &mCheckDept
                               &mAgreement
                               &mEmplWhere
                               &mAgrProduct
                               &mAgrClass
                               &mRole
                               &mJur
                               &mSign
                               &mBeg
                               &mEnd
         ),
   --------------*** ТРАНШИ и ПРОСРОЧЕННЫЙ ПЛАТЕЖ ***--------------
  w_data as ( select
                agrisn       as AgrISN,
                datepay      as DatePay,
                sum(PlanSum) as PlanSum,
                sum(FactSum) as FactSum,
                insclassisn
                from ( select
                         s.agrisn,
                         s.datepay,
                         decode(s.discr, 'G', round(s.amount),0) as PlanSum,
                         decode(s.discr, 'F', round(s.amount),0) as FactSum,
                         c.insclassisn
                         from agrsum s
                         join agrcond c on c.isn = s.agrisn
                        where s.acc = 'B'
                          and s.discr in ('G', 'F')
                          --and s.classisn2 = cnt.ISN('amInsPrem')
                          and s.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'))
                          --and s.agrisn in (4160666,4143726,4171420,2302195,2257286,4538888)
                          and s.agrisn in (select AgrISN from Agr)
                       order by s.datepay
                     )
              group by agrisn, insclassisn, datepay
              order by agrisn, datepay
           ),
 w_cnt as (
 select d1.agrisn, d1.insclassisn, count(d1.plansum) cnt from w_data d1 where d1.agrisn = agrISN and d1.plansum <> 0 group by d1.agrisn, d1.insclassisn
  ),

   balance as( select
   t.agrISN,
   t.insclassisn,
    t.DatePay,
    t.plansum,
    t.factsum,
    wc.cnt as tr_Cnt,
    sum(t.Balance) OVER (partition by t.AgrISN order by t.DatePay) ClosedSum
    from(  SELECT agrISN,
                  insclassisn,
                  DatePay,
                      plansum,
                      factsum,
                      plansum-factsum as Balance
                       FROM w_data
                       order by agrisn, datepay
  )t
  join w_cnt wc on wc.agrisn= t.agrisn
   order by AgrISN, DatePay),

BandT as(

 select
 b.agrISN,
 b.insclassisn,
  b.DatePay,
  b.plansum,
  b.factsum,
  b.ClosedSum,
  tr_cnt,


  case
    -- если один транш, выводить дату  транша--
    when tr_cnt in (0, 1)
      then (select min(g.DatePay)
              from w_data g
             where nvl(g.plansum,0) <> 0
               and  g.AgrISN = b.AgrISN
            group by g.AgrISN)
    -- если транша нет, выводить дату  datepay--
   when tr_cnt is null
     then  b.DatePay
    -- если сумма закрыта, выбираем следующую дату транша
    when b.ClosedSum <= 0
       then  (select min(g.DatePay)
               from w_data g
               where nvl(g.plansum,0) <> 0 and g.DatePay > b.DatePay
               and  g.AgrISN = b.AgrISN
             group by g.AgrISN)
     -- если первая дата оплаты, выбираем минимальный транш
      when lag(b.DatePay) over (partition by agrisn order by b.DatePay) is null
       then (select min(g.DatePay)
              from w_data g
             where nvl(g.plansum,0) <> 0
               and  g.AgrISN = b.AgrISN
            group by g.AgrISN)
    -- если транш не оплачен, выбираем дату транша которая больше последнего оплаченного
    when b.ClosedSum > 0 and lag(b.ClosedSum ) over (partition by agrisn order by b.DatePay) > 0
      then (select min(g.DatePay)
              from balance g
             where nvl(g.PlanSum,0) <> 0 and  g.closedSUM > 0
             and g.DatePay >(select max (g1.DatePay)
                               from balance g1
                              where g1.closedSUM <=0
                                 and  g1.AgrISN = g.AgrISN)
             and  g.AgrISN = b.AgrISN
             group by g.AgrISN )

    when b.plansum <> 0 and
         b.ClosedSum > 0 and
         lag(b.ClosedSum ) over (partition by agrisn order by b.DatePay) <= 0
      then b.DatePay

    -- если последняя дата оплаты и сумма закрыта выбираем максимальный транш
    when b.ClosedSum <= 0 and lead (b.DatePay ) over (order by b.DatePay) is null
      then (select max(g.DatePay)
              from w_data g
             where nvl(g.plansum,0) <> 0
               and  g.AgrISN = b.AgrISN
            group by g.AgrISN)
       when b.ClosedSum > 0 and lag(b.ClosedSum ) over (order by b.DatePay) <= 0
      then b.DatePay

      end
      as NextTransch,
      lead (b.DatePay ) over (partition by agrisn order by b.DatePay) LeadDate

from balance b
order by b.AgrISN, b.DatePay ),

LastTransch as (
  select distinct
    b2.agrISN,
    b2.insclassisn,
    last_value(b2.NextTransch) over (partition by b2.agrISN ) as LastTr
    from BandT b2
    where b2.NextTransch is not null ),

newBandT as( select
  agrISN,
  insclassisn,
  max(DatePay) DatePay,
  max(plansum) PlanSum,
  max(factsum) FactSum,
  max(ClosedSum) ClosedSum,
  Max(NewTransch) NextTransch

  from( select
          b1.agrISN,
         b1.insclassisn,
          b1.DatePay,
          b1.plansum,
          b1.factsum,
          b1.ClosedSum,
          b1.tr_cnt,
case
  when b1.NextTransch is null and  b1.PlanSum = 0 and b1.ClosedSum  <= 0 and b1.LeadDate is null
    then lag(b1.NextTransch ) over (partition by agrisn order by b1.datepay)
 when b1.NextTransch is null and
      b1.ClosedSum  > 0 and
       lag(b1.NextTransch ) over (partition by agrisn order by b1.datepay) is null

  then --to_date('01.03.2020','dd.mm.yyyy')

     (select lt.LastTr
            from LastTransch lt
           where lt.agrISN = b1.agrISN
           )
            when b1.NextTransch is null and
      b1.ClosedSum  > 0 and
       lag(b1.NextTransch ) over (partition by agrisn order by b1.datepay) is not null
       then lag(b1.NextTransch ) over (partition by agrisn order by b1.datepay)

               else b1.NextTransch
end NewTransch,

/*(select distinct last_value(b2.NextTransch) over (order by b2.agrISN)
            from BandT b2
           where b2.agrISN = b1.agrISN
            and b2.NextTransch is not null
            ) as Transhok,   */
 lag(b1.NextTransch ) over (partition by agrisn order by b1.datepay) LagTransch,
      b1.LeadDate

      from BandT b1
order by b1.AgrISN, b1.DatePay )
where DatePay < :pDate1 --to_date('01.02.2020','dd.mm.yyyy')
or (/*DatePay > :pDate1 to_date('01.04.2020','dd.mm.yyyy') and*/ tr_cnt =1)
group by agrisn, insclassisn),
   --------------*** ТРАНШИ и ПРОСРОЧЕННЫЙ ПЛАТЕЖ ***--------------

   Subj as ( select s.isn, s.iin, s.fullname,
                  s.juridical jur,
                    decode(s.resident,'Y','Резидент','Нерезидент') res
               from subject s
           ),
   /*InsClass as ( select t.x1, d2.Fullname InsRulesName, t.x2, d1.code InsClassCode, d1.FullName InsClassName
                   from Tariff t, Dicti d1, Dicti d2
                  where TariffISN = Cnt.ISN('trfInsuranceTypeForKind')
                    and t.X1 = d1.ISN(+)
                    and t.X2 = d2.ISN(+)
               ),*/
   saldoperiod as ( select isn
                     from accsaldoperiod
                    where dateend = (select max(dateend )
                                       from accsaldoperiod
                                      where dateend < :pDate1 )
                  ),
   saldo as ( select sa.periodisn, sa.datebeg, sa.subjisn, sa.agrisn,sum(sa.amountcredit) credit,sum(sa.amountcredit) debit, sa.insclassisn
                from accsaldo sa
                join saldoperiod sap on sap.isn = sa.periodisn
               where sa.accisn in( 485781,485761)
              group by sa.periodisn, sa.datebeg, sa.subjisn, sa.agrisn, sa.insclassisn
 ),

   --------------*** РЕЗЕРВЫ ***--------------
OSV as
  (SELECT
     AccISN,
     SubjISN,
     AgrISN,
     insclassisn,
     greatest(nvl(sum(OstatokDebet), 0)-nvl(sum(OstatokCredit), 0), 0) as OstatokDebet,
     greatest(nvl(sum(OstatokCredit), 0)-nvl(sum(OstatokDebet), 0), 0) as OstatokCredit
     FROM -- ОБОРОТЫ + ОСТАТКИ НА НАЧАЛО И КОНЕЦ ОТЧЕТНОГО ПЕРИОДА
         (select
            sa.AccISN                                          as AccISN,
            sa.AmountDebet                                     as OstatokDebet,
            sa.AmountCredit                                    as OstatokCredit,
            decode(sa.SubjISN, 0, to_number(null), sa.SubjISN) as SubjISN,
            decode(sa.AgrISN, 0, to_number(null), sa.AgrISN)   as AgrISN,
            sa.insclassisn
            from AccSaldo sa
           where sa.AccISN in ( 485761,-- 1290.01.1
                                485781 -- 1290.01.3
                              )
            and sa.PeriodISN = 201701
            --and sa.AgrISN = 1859107
          union all
          select
            sa.DebetISN as AccISN,
            sa.Amount   as OstatokDebet,
            to_number(null) as OstatokCredit,
            decode(sa.DebetSubjISN, 0, to_number(null), sa.DebetSubjISN) as SubjISN,
            decode(sa.AgrISN, 0, to_number(null), sa.AgrISN) as AgrISN, sa.insclassisn
            from AgrSumBuh sa
            left join AgrSum s on s.ISN = sa.AgrSumISN
           where sa.DebetISN in (
                                  485761, -- 1290.01.1
                                  485781 -- 1290.01.3
                                )
             and sa.DatePay between to_date('01.01.2017','dd.mm.yyyy') and :pDate1 --to_date('31.08.2020','dd.mm.yyyy')
             --and sa.AgrISN = 1859107
          union all
          select
            asb.CreditISN as AccISN,
            to_number(null) as OstatokDebet,
            asb.Amount as OstatokCredit,
            decode(asb.CreditSubjISN, 0, to_number(null), asb.CreditSubjISN) as SubjISN,
            decode(asb.AgrISN, 0, to_number(null),asb.AgrISN) as AgrISN, asb.insclassisn
            from AgrSumBuh asb
            left join AgrSum s on s.ISN = asb.AgrSumISN
           where asb.CreditISN in (
                                    485761, -- 1290.01.1
                                    485781 -- 1290.01.3
                                  )
             and asb.DatePay between to_date('01.01.2017','dd.mm.yyyy') and  :pDate1 --to_date('31.08.2020','dd.mm.yyyy')
             --and asb.AgrISN = 1859107

    )
    WHERE 1=1
  GROUP BY AccISN,SubjISN,AgrISN, insclassisn
  ),

 Reserv as
  (select *
     from ( select
              AgrID,
              agrisn, insclassisn,
              sum (Reserv) as Reserv

              from ( select
                       t.agrisn,
                       t.insclassisn,
                       a.id as AgrID,
                       a.productisn as Product,
                       t.accisn,
                       d.code,
                       OstatokCredit as Reserv

                       from osv  t
                       left join dicti d on d.isn = t.accisn
                       left join agreement a on a.isn = t.agrisn

                      where 1 = 1
                     --and a.isn = 3291042
                  )

   group by Product, AgrID, agrisn, insclassisn
   order by Product,Agrid)
 ),
   --------------*** РЕЗЕРВЫ ***--------------


   DZ as ( select t1.agrisn, t1.insclassisn, t1.trunsch, t1.amountG ,  t1.DateG, t2.amountF ,  DateF, DateP,  --DateG-DateF,
                  case when nvl(t1.amountG,0)-nvl(t2.amountF,0) >0 then (:pDate1-1) - t1.DateG end Daydz,
                  case when nvl(t1.amountG,0)-nvl(t2.amountF,0) >0 then nvl(t1.amountG,0)-nvl(t2.amountF,0) end ProsTrunsch,
                  case
                    when nvl(t1.amountG,0)-nvl(t2.amountF,0)< = 0
                      then (select min(datepay)
                              from agrsum
                             where agrisn = t1.agrisn
                               and classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                               and discr = 'G'
                               and datepay >  t1.DateG)
                    when nvl(t1.amountG,0)-nvl(t2.amountF,0) >0
                      then t1.DateG
                  end NextPaydate,
                  (:pDate1-1)- add_months((:pDate1-1),-1) dz30,
                  (:pDate1-1)- add_months((:pDate1-1),-3) dz90,
                  (:pDate1-1)- add_months((:pDate1-1),-12)dz365,
                  ( select t.tdate tdate
                      from ( select rownum rn,trunc(h.data) tdate, h.*
                              from zholiday h
                             where h.data between trunc(:pDate1-1, 'month') and trunc(:pDate1-1)
                               and holiday not in (1,2,3)
                             order by  h.data desc
                           )t
                     where rn=3 ) cdate,
                     /*DateGmin, x.DateGmax, x.trunsch2,*/ x.amountGmin, x.amountGmax
             from (select s.agrisn, c.insclassisn, case when sum(s.amount) = 0 then round(Sys_Utils.GetCurrRate(sum(s.amountagr),max(s.agrcurrisn),cnt.isn('KZT'),max(s.datepay)),2) else sum(s.amount) end amountG, count(distinct s.datepay) trunsch, max(s.datepay) DateG
                      from agrsum s
                      join agrcond c on c.isn = s.condisn
                      join agr a on a.agrisn = s.agrisn and a.insclassisn = c.insclassisn
                     where s.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                       and s.discr = 'G'
                       and s.datepay <= :pDate1-1
                    group by s.agrisn, c.insclassisn ) t1
        left join ( select s.agrisn, sb.insclassisn, sum(s.amount)  amountF, max(s.datepay) DateF
                      from agrsum s
                      join agr a on a.agrisn = s.agrisn
                      join agrsumbuh sb on sb.agrsumisn = s.isn and sb.insclassisn = a.insclassisn and ((sb.debet in ('3510.41','3510.42') and sb.credit in ('1280.41', '1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3510.41','3510.42')) or
                         (sb.debet in ('3520.01') and sb.credit in ('1280.41','1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3520.01')) or
                         (sb.debet in ('3390.42')   and sb.credit in ('1280.41','1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3390.42')))
                     where s.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                       and s.discr = 'F'
                       and s.datepay <= :pDate1-1
                    group by s.agrisn, sb.insclassisn) t2 on t1.agrisn = t2.agrisn and t1.insclassisn = t2.insclassisn
        left join ( select s.agrisn, a.insclassisn, sum(s.amount) amountP, max(s.datepay) DateP
                      from agrsum s
                      join agrcond c on c.isn = s.condisn
                      join agr a on a.agrisn = s.agrisn and a.insclassisn = c.insclassisn
                     where s.classisn2 in (cnt.ISN('amInsPrem'))
                       and s.discr = 'P'
                       and s.datepay <= :pDate1-1
                    group by s.agrisn, a.insclassisn) t3 on t1.agrisn = t3.agrisn and t1.insclassisn = t3.insclassisn

        left join (select agrisn, insclassisn, sum(amountGmin) amountGmin, sum(amountGmax) amountGmax from
                  ( select s.agrisn, c.insclassisn, case when s.datepay < trunc(sysdate) and (trunc(sysdate)-1 -s.datepay) > (trunc(sysdate)-1)- add_months((trunc(sysdate)-1),-3) then sum(s.amount) end amountGmin,
                                     case when s.datepay < trunc(sysdate) and (trunc(sysdate)-1 -s.datepay) <= (trunc(sysdate)-1 - add_months((trunc(sysdate)-1),-3)) then sum(s.amount) end amountGmax
                      from agrsum s
                      join agrcond c on c.isn = s.condisn
                      join agr a on a.agrisn = s.agrisn and a.insclassisn = c.insclassisn
                     where s.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                       and s.discr = 'G'
                       and s.datepay > ( select max(s1.datepay)
                      from agrsum s1
                      join agrcond c1 on c1.isn = s1.condisn
                     where s1.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                       and s1.discr = 'F'
                       and s1.datepay <= :pDate1-1
                       and s1.agrisn = s.agrisn
                      and c1.insclassisn = c.insclassisn   --
                       --and s.agrisn = 2136500
                    group by s1.agrisn, c1.insclassisn)

                    group by s.agrisn, s.datepay, c.insclassisn) m group by m.agrisn, m.insclassisn) x  on  t1.agrisn = x.agrisn  and t1.insclassisn = x.insclassisn
                    -- mAgr2
                    -- where t1.agrisn = 2136500

         ),
                 agrClass as (select distinct d1.code classCode, d1.fullname className, t.X2 as  insclassisn, t.x1  ---2125420
                            from Tariff t
                            join Dicti d1 on t.X1 = d1.ISN
                           where TariffISN = Cnt.ISN('trfInsuranceTypeForKind')
                             ),

           maintab as (
           select xs.iin iin,
                               xs.fullname ClientName,
                               xs.jur jur,
                               d1.shortname,
                               d2.fullname,
                               xa.agrid,
                               xa.SaleChannel,
                               xa.AgrStatus,
                               xa.AgrSign,

                               xa.agrbeg,
                               str_utils.GetMonthName(xa.agrbeg) monthAgrBeg,
                               trunc(add_months(xa.agrbeg,1),'MONTH')-1 EndMonthAgrBeg,
                               to_char(xa.agrbeg, 'YYYY') YearAgrBeg,
                               xa.agrend,
                               trunc(xa.agrcreated) AgrCreated,

                               agr_utils.GetAgrAgents(xa.agrisn,1) AgrAgent,
                               s1.fullname emplname,
                               s2.Fullname DeptName,
                               agr_utils.GetAgrBlanks(xa.agrisn, Cnt.ISN('cBsoPoliceType'), Cnt.ISN('cBsoStateAgr'), 'N') BSO,
                               agr_utils.GetAgrBlanks(xa.AgrCrossIsn, Cnt.ISN('cBsoPoliceType'), Cnt.ISN('cBsoStateAgr'), 'N') BSOcross,
                               xa.amountP,
                               xa.amountF,
                               xa.dz,
                                nvl(b.closedsum,xa.dz) as ProsTrunsch ,
                                nvl(b.nexttransch,xa.agrbeg) as NextPaydate,
                               xa.agrisn,
                               xa.dz1_12,
                               xa.obgG,
                               (select fullname
                                      from subdept d
                                      where parentisn = 1000
                                      start with isn =  xa.agrdep
                                      connect by prior parentisn=isn) MainDeptName,
                                (select isn
                                      from subdept d
                                      where parentisn = 1000
                                      start with isn =  xa.agrdep
                                      connect by prior parentisn=isn) MainDeptISN,
                                d.amountGmin, d.amountGmax,
                                xa.agrdep, xa.agrempl, xa.agrclient, xa.productisn, k.classCode, k.className
                          from Agr xa
                          left join agrClass k on k.insclassisn = xa.insclassisn
                          left join Subj xs on xs.isn  = xa.agrclient
                          left join Dicti d1 on d1.isn = xa.classisn
                          left join Dicti d2 on d2.isn = xa.productisn
                          left join DZ d on d.agrisn = xa.agrisn and d.insclassisn = xa.insclassisn
                          left join Subject s1 on s1.isn = xa.agrempl
                          left join V_DeptMain v on v.DEPTISN = xa.agrdep
                          left join Subject s2 on s2.isn = xa.agrdep
                          left join NewBandT b on b.AgrISN = xa.Agrisn and b.insclassisn = xa.insclassisn
                      )


        select
          t.agrempl, --// ISN куратора
          t.agrdep, --//ISN Депратамента куратора
          t.MainDeptISN, --ISN основного депа
          t.agrclient, --// ISN Клиента
          t.productisn, --// ISN Продукта
          t.classCode, --// код класса страхования
          t.className, --// имя класса страхования
          t.agrid, --// Номер договора
          t.fullname, --//Имя Продукта
          t.ClientName, --// ФИО \ Название компании
          t.jur, --// Признак физ юр (Y) - юр лицо, (N) - Физик
          t.AgrSign, --//Дата подписания
          t.agrbeg, --//Дата начала действия договора
          t.amountP, --//Премия
          t.amountF, --//Факт оплаты / Размер оплаченной премии
          t.dz, --//Сумма ДЗ
          t.AgrAgent, --//ФИО Агента
          t.emplname, --// Куратор договора
          t.DeptName, --//Департамент
          t.MainDeptName --основной деп
        from  maintab t
        ";
        $startTime = time();
        $AgrISN = null;
        $DeptISN = 1000;
        $EmplISN = null;
        $ProductISN = null;
        $AgrClass = null;
        $RoleClass = null;
        $RoleSubj = null;
        $Jur = null;
        $Date1 = "to_date('28.09.2020', 'dd.mm.yyyy')";
        $DateSign1 = null;
        $DateSign2 = null;
        $DateBeg1  = null;
        $DateBeg2  = null;
        $DateEnd1  = null;
        $DateEnd2  = null;
        $CheckDept = null;


        #Обязательно
        $sql = str_replace(':pDate1', $Date1, $sql); #Отчетная дата:
        $sql = str_replace(':pDept1ISN', $DeptISN, $sql); #Департамент
        #на выбор
        $sql = str_replace('&mAgreement', $AgrISN != null ? "and a.isn = $AgrISN" : "", $sql); #Договор
        $sql = str_replace('&mEmplWhere', $EmplISN != null ? "and a.EmplISN = $EmplISN" : "", $sql); #Сотрудник
        $sql = str_replace('&mAgrClass', $AgrClass != null ? "and a.classisn in (select isn  from dicti start with ISN = $AgrClass connect by prior isn = parentisn)" : "", $sql); #Тип договора. Справочник 2110
        $sql = str_replace('&mAgrProduct', $ProductISN != null ? "and a.ProductISN in (select isn from dicti start with isn=$ProductISN connect by prior isn=parentisn)" : "", $sql); # Продукт. Справочник 13
        $sql = str_replace('&mRole', $RoleClass != null ? "and exists (select 1 from agrrole ar where ar.AgrISN=a.ISN and ar.subjisn = $RoleSubj and ar.classisn = $RoleClass)" : "", $sql); #
        $sql = str_replace('&mJur', $Jur != null ? "and subj_utils.GetSubjJur(a.clientisn) in ($Jur)" : "", $sql); #
        $sql = str_replace('&mSign', $DateSign1 != null ? "and a.datesign between $DateSign1 and $DateSign2" : "", $sql); #
        $sql = str_replace('&mBeg',  ($DateBeg1 != null && $DateBeg2 != null) ? "and a.datebeg between $DateBeg1 and $DateBeg2" : "", $sql); #
        $sql = str_replace('&mEnd',  $DateEnd1 != null ? "and a.dateend between $DateEnd1 and $DateEnd2" : "", $sql); #
        $sql = str_replace('&mCheckDept',  $CheckDept != null ? " and a.DeptISN not in (select isn from subdept start with isn in (2000) connect by prior isn = parentisn)" : "", $sql); #

        $result = $this->execute($sql);
        $i=0;
        $sum = 0;
        ReportReceivables::query()->truncate();
        foreach ($result as $v) {
          $i++;

          $nowtime = time();
          $workTime = $nowtime - $startTime;
          try {
            $RR = new ReportReceivables;
              $RR->agrEmplISN = $v->agrempl; // ISN куратора
              $RR->agrDepISN = $v->agrdep;  //ISN Депратамента куратора
              $RR->agrClientISN = $v->agrclient; // ISN Клиента
              $RR->agrId = $v->agrid; // Номер договора
              $RR->productISN = $v->productisn; //Имя Продукта
              $RR->productName = $v->fullname;//Имя Продукта
              $RR->clientName = $v->clientname; // ФИО \ Название компании
              $RR->jur = $v->jur;// Признак физ юр (Y) - юр лицо, (N) - Физик
              $RR->agrSign =  $v->agrsign; //Дата подписания
              $RR->agrBeg = $v->agrbeg;; //Дата начала действия договора
              $RR->amountP = $this->tofloat($v->amountp);//Премия
              $RR->amountF =  $this->tofloat($v->amountf); //Факт оплаты / Размер оплаченной премии
              $RR->amountD =  $this->tofloat($v->dz); //Сумма ДЗ
              $RR->agrAgent = $v->agragent; //ФИО Агента
              $RR->emplName = $v->emplname; // Куратор договора
              $RR->DeptName = $v->deptname; //Департамент
              $RR->mainDeptName = $v->maindeptname; // основной деп
              $RR->agrMainDepISN = $v->maindeptisn; // основной деп ISN
              $RR->productClassCode = $v->classcode; // класс страхования ISN
              $RR->productClassName = $v->classname; // название класса страхования
            $RR->save();
          } catch (\Exception $e) {
            print '<b>'.var_dump($v).'</b> <br /> <hr />';
            print $e;
            break;
          }


        }
        print"<h1>Общая сумма ДЗ: $sum</h1>";
        print"<h1>Время работы: $workTime</h1>";
        // return view('oracle.DZnewGani')
        //             ->with('result', $result)
        //             ->with('startTime', $startTime);
    }

    protected function tofloat($num) {
    $dotPos = strrpos($num, '.');
    $commaPos = strrpos($num, ',');
    $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
        ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

    if (!$sep) {
        return floatval(preg_replace("/[^0-9]/", "", $num));
    }

    return floatval(
        preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
        preg_replace("/[^0-9]/", "", substr($num, $sep+1, strlen($num)))
    );
}


}
