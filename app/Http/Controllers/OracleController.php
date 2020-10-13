<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OracleController extends Controller
{
    public function execute($sql){
        $query = DB::connection('oracle')
            ->select($sql);
        return $query;
    }

    public function test(){

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
        $result = $this->execute($sql);
        return view('oracle.test', compact('result'));
    }

    public function subject(){
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
           sum (premium) as premium,
           sum (payment) as payment,
           sum (amount)  as DZ,
           round(sum (premium)/12) as DZ1_12,
           sum(schedule) as schedule,
           sum(scheduleCount) as scheduleCount

           from (
                  select
                    sb.agrisn,
                    case
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
                   where sb.datepay <= (:pDate1-1)

                     and (sb.debet in ('1280.41', '1280.42') or sb.credit  in ('1280.41', '1280.42'))

                  union all
                  select
                    sb.agrisn,
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
                   where sb.datepay <= (:pDate1-1)
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
                         (sb.debet in ('3390.43.2') and sb.credit in ('7470.40.3')))

                  union all
                  select
                    sb.agrisn,
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
                   where sb.datepay <= (:pDate1-1)
                     and ((sb.debet in ('3510.41','3510.42') and sb.credit in ('1280.41', '1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3510.41','3510.42')) or
                         (sb.credit in ('1280.42') and sb.debet   in ('1280.42'))or
                         (sb.debet in ('3520.01') and sb.credit in ('1280.41','1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3520.01')) or
                         (sb.debet in ('3390.42')   and sb.credit in ('1280.41','1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3390.42')))


                  union all
                  select sa.agrisn,
                    sum(sa.amountdebet) as debit,
                    sum(sa.amountdebet) as Premium,
                    0 as Payment,
                    0 as schedule,
                    0 as scheduleCount
                    from accsaldo sa
                   where sa.periodisn = 201701
                     and sa.accisn in(485591,485601)
                  group by sa.periodisn, sa.datebeg,sa.deptisn, sa.subjisn, sa.agrisn


                  union all
                  select
                    s.agrisn,
                    0 as debit,
                    0 as Premium,
                    0 as Payment,
                    sum(s.amount) as schedule,
                    count (distinct s.datepay) as scheduleCount
                    from agrsum s
                   where s.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                     and s.discr ='G'
                     and s.acc = 'B'
                  group by s.agrisn
                ) group by agrisn
         )  t
  join Agreement a on a.isn = t.agrisn
       join (select ssd.isn
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

                       &mAgreement
                       &mEmplWhere
                       &mAgrProduct
                       &mAgrClass
                       &mRole
                       &mJur
                       &mSign
                       &mBeg
                       &mEnd


   and a.emplisn in ( case
                        when (select max(dt.typ)
                                from v_dutymain dt
                               where dt.SubjectISN in (select sys_utils.GetUserISN from dual)) = 151 or
                             (select sys_utils.GetUserISN from dual) in (select dr.valn1 from docrow dr where docisn = 16039028) or
                             ( select sys_utils.GetUserISN from dual) in (1445912) or
                             (select max(dt.DutyISN) from v_dutymain dt where dt.SubjectISN in (select sys_utils.GetUserISN from dual)) in (701,585,637,586,587,588,589)
                          then a.emplisn
                        when (select sys_utils.GetUserISN from dual) in (1445939) and exists (select 1 from D1 j where j.isn = a.emplisn)
                          then a.emplisn
                            else (select sys_utils.GetUserISN from dual)
                      end )


         ),

  w_data as ( select
                agrisn       as AgrISN,
                datepay      as DatePay,
                sum(PlanSum) as PlanSum,
                sum(FactSum) as FactSum
                from ( select
                         s.agrisn,
                         s.datepay,
                         decode(s.discr, 'G', round(s.amount),0) as PlanSum,
                         decode(s.discr, 'F', round(s.amount),0) as FactSum
                         from agrsum s
                        where s.acc = 'B'
                          and s.discr in ('G', 'F')
                          and s.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'))
                          and s.agrisn in (select AgrISN from Agr)
                       order by s.datepay
                     )
              group by agrisn, datepay
              order by agrisn, datepay
           ),
 w_cnt as (
 select d1.agrisn, count(d1.plansum) cnt from w_data d1 where d1.agrisn = agrISN and d1.plansum <> 0 group by d1.agrisn
  ),

   balance as( select
   t.agrISN,
    t.DatePay,
    t.plansum,
    t.factsum,
    wc.cnt as tr_Cnt,
    sum(t.Balance) OVER (partition by t.AgrISN order by t.DatePay) ClosedSum
    from(  SELECT agrISN,
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
  b.DatePay,
  b.plansum,
  b.factsum,
  b.ClosedSum,
  tr_cnt,


  case

    when tr_cnt in (0, 1)
      then (select min(g.DatePay)
              from w_data g
             where nvl(g.plansum,0) <> 0
               and  g.AgrISN = b.AgrISN
            group by g.AgrISN)

   when tr_cnt is null
     then  b.DatePay

    when b.ClosedSum <= 0
       then  (select min(g.DatePay)
               from w_data g
               where nvl(g.plansum,0) <> 0 and g.DatePay > b.DatePay
               and  g.AgrISN = b.AgrISN
             group by g.AgrISN)

      when lag(b.DatePay) over (partition by agrisn order by b.DatePay) is null
       then (select min(g.DatePay)
              from w_data g
             where nvl(g.plansum,0) <> 0
               and  g.AgrISN = b.AgrISN
            group by g.AgrISN)

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
    last_value(b2.NextTransch) over (partition by b2.agrISN ) as LastTr
    from BandT b2
    where b2.NextTransch is not null ),

newBandT as( select
  agrISN,
  max(DatePay) DatePay,
  max(plansum) PlanSum,
  max(factsum) FactSum,
  max(ClosedSum) ClosedSum,
  Max(NewTransch) NextTransch

  from( select
          b1.agrISN,
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

  then

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
 lag(b1.NextTransch ) over (partition by agrisn order by b1.datepay) LagTransch,
      b1.LeadDate

      from BandT b1
order by b1.AgrISN, b1.DatePay )
where DatePay < :pDate1
or ( tr_cnt =1)
group by agrisn),


   Subj as ( select s.isn, s.iin, s.fullname,
                    decode(s.juridical,'Y','Юр. лицо','Физ.лицо') jur,
                    decode(s.resident,'Y','Резидент','Нерезидент') res
               from subject s
           ),
   saldoperiod as ( select isn
                     from accsaldoperiod
                    where dateend = (select max(dateend )
                                       from accsaldoperiod
                                      where dateend < :pDate1 )
                  ),
   saldo as ( select sa.periodisn, sa.datebeg, sa.subjisn, sa.agrisn,sum(sa.amountcredit) credit,sum(sa.amountcredit) debit
                from accsaldo sa
                join saldoperiod sap on sap.isn = sa.periodisn
               where sa.accisn in( 485781,485761)
              group by sa.periodisn, sa.datebeg, sa.subjisn, sa.agrisn
 ),

OSV as
  (SELECT
     AccISN,
     SubjISN,
     AgrISN,
     greatest(nvl(sum(OstatokDebet), 0)-nvl(sum(OstatokCredit), 0), 0) as OstatokDebet,
     greatest(nvl(sum(OstatokCredit), 0)-nvl(sum(OstatokDebet), 0), 0) as OstatokCredit
     FROM
         (select
            sa.AccISN                                          as AccISN,
            sa.AmountDebet                                     as OstatokDebet,
            sa.AmountCredit                                    as OstatokCredit,
            decode(sa.SubjISN, 0, to_number(null), sa.SubjISN) as SubjISN,
            decode(sa.AgrISN, 0, to_number(null), sa.AgrISN)   as AgrISN
            from AccSaldo sa
           where sa.AccISN in ( 485761,
                                485781
                              )
            and sa.PeriodISN = 201701
          union all
          select
            sa.DebetISN as AccISN,
            sa.Amount   as OstatokDebet,
            to_number(null) as OstatokCredit,
            decode(sa.DebetSubjISN, 0, to_number(null), sa.DebetSubjISN) as SubjISN,
            decode(sa.AgrISN, 0, to_number(null), sa.AgrISN) as AgrISN
            from AgrSumBuh sa
            left join AgrSum s on s.ISN = sa.AgrSumISN
           where sa.DebetISN in (
                                  485761,
                                  485781
                                )
             and sa.DatePay between to_date('01.01.2017','dd.mm.yyyy') and :pDate1
          union all
          select
            asb.CreditISN as AccISN,
            to_number(null) as OstatokDebet,
            asb.Amount as OstatokCredit,
            decode(asb.CreditSubjISN, 0, to_number(null), asb.CreditSubjISN) as SubjISN,
            decode(asb.AgrISN, 0, to_number(null),asb.AgrISN) as AgrISN
            from AgrSumBuh asb
            left join AgrSum s on s.ISN = asb.AgrSumISN
           where asb.CreditISN in (
                                    485761,
                                    485781
                                  )
             and asb.DatePay between to_date('01.01.2017','dd.mm.yyyy') and  :pDate1

    )
    WHERE 1=1
  GROUP BY AccISN,SubjISN,AgrISN
  ),

 Reserv as
  (select *
     from ( select
              AgrID,
              agrisn,
              sum (Reserv) as Reserv

              from ( select
                       t.agrisn,
                       a.id as AgrID,
                       a.productisn as Product,
                       t.accisn,
                       d.code,
                       OstatokCredit as Reserv

                       from osv  t
                       left join dicti d on d.isn = t.accisn
                       left join agreement a on a.isn = t.agrisn

                      where 1 = 1
                  )

   group by Product, AgrID, agrisn
   order by Product,Agrid)
 ),

   DZ as ( select t1.agrisn, t1.trunsch, t1.amountG ,  t1.DateG, t2.amountF ,  DateF, DateP,
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
                      x.amountGmin, x.amountGmax
             from (select s.agrisn, case when sum(s.amount) = 0 then round(Sys_Utils.GetCurrRate(sum(s.amountagr),max(s.agrcurrisn),cnt.isn('KZT'),max(s.datepay)),2) else sum(s.amount) end amountG, count(distinct s.datepay) trunsch, max(s.datepay) DateG
                      from agrsum s
                     where s.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                       and s.discr = 'G'
                       and s.datepay <= :pDate1-1
                    group by s.agrisn ) t1
        left join ( select s.agrisn, sum(s.amount)  amountF, max(s.datepay) DateF
                      from agrsum s
                      join agrsumbuh sb on sb.agrsumisn = s.isn and ((sb.debet in ('3510.41','3510.42') and sb.credit in ('1280.41', '1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3510.41','3510.42')) or
                         (sb.debet in ('3520.01') and sb.credit in ('1280.41','1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3520.01')) or
                         (sb.debet in ('3390.42')   and sb.credit in ('1280.41','1280.42')) or
                         (sb.debet in ('1280.41','1280.42') and sb.credit in ('3390.42')))
                     where s.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                       and s.discr = 'F'
                       and s.datepay <= :pDate1-1
                    group by s.agrisn) t2 on t1.agrisn = t2.agrisn
        left join ( select s.agrisn, sum(s.amount) amountP, max(s.datepay) DateP
                      from agrsum s
                     where s.classisn2 in (cnt.ISN('amInsPrem'))
                       and s.discr = 'P'
                       and s.datepay <= :pDate1-1
                    group by s.agrisn) t3 on t1.agrisn = t3.agrisn

        left join (select agrisn, sum(amountGmin) amountGmin, sum(amountGmax) amountGmax from
                  ( select s.agrisn, case when s.datepay < trunc(sysdate) and (trunc(sysdate)-1 -s.datepay) > (trunc(sysdate)-1)- add_months((trunc(sysdate)-1),-3) then sum(s.amount) end amountGmin,
                                     case when s.datepay < trunc(sysdate) and (trunc(sysdate)-1 -s.datepay) <= (trunc(sysdate)-1 - add_months((trunc(sysdate)-1),-3)) then sum(s.amount) end amountGmax
                      from agrsum s
                     where s.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                       and s.discr = 'G'
                       and s.datepay > ( select max(s1.datepay)
                      from agrsum s1
                     where s1.classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                       and s1.discr = 'F'
                       and s1.datepay <= :pDate1-1
                       and s1.agrisn = s.agrisn
                    group by s1.agrisn)

                    group by s.agrisn, s.datepay )group by agrisn) x  on  t1.agrisn = x.agrisn

         ),

   maintab as ( select xs.iin iin,
                       xs.fullname ClientName,
                       xs.jur jur,
                       xs.res res,
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
                       rs.reserv,
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
                        d.amountGmin, d.amountGmax
                  from Agr xa
                  left join Subj xs on xs.isn  = xa.agrclient
                  left join Dicti d1 on d1.isn = xa.classisn
                  left join Dicti d2 on d2.isn = xa.productisn

                  left join reserv rs on rs.agrisn = xa.agrisn
                  left join DZ d on d.agrisn = xa.agrisn
                  left join Subject s1 on s1.isn = xa.agrempl
                  left join V_DeptMain v on v.DEPTISN = xa.agrdep
                  left join Subject s2 on s2.isn = xa.agrdep
                  left join NewBandT b on b.AgrISN = xa.Agrisn  /*Гладкова К./26.02.2020/Новый функционал по графику*/
              )


select
  t.iin,
  t.ClientName,
  t.jur,
  t.res,
  t.shortname,
  t.fullname,

  t.agrid,
  t.AgrStatus,
  t.AgrSign,
  t.agrbeg,
  t.monthAgrBeg,
  t.YearAgrBeg,
  t.amountP,
  t.amountF,
  t.dz,
    case when to_number(t.ProsTrunsch) > t.dz then t.dz else to_number(t.ProsTrunsch) end ProsTrunsch,
  t.NextPaydate,
  to_char(t.NextPaydate,'month'),
  to_char(t.NextPaydate,'yyyy'),
  t.obgG,
  t.reserv,
  case
    when ((:pDate1-1) - t.NextPaydate) > 0
    then ((:pDate1-1) - t.NextPaydate)  end  CntDaysDZ,
  case
    when (:pDate1-1) - t.NextPaydate <= 0
      then null
    when (:pDate1-1) - t.NextPaydate between 1 and 7 or d.daydz is null
      then '1. 1 Неделя'
    when (:pDate1-1) - t.NextPaydate between 8 and 14
      then '2. 2 Недели'
    when (:pDate1-1) - t.NextPaydate between 15 and 22
      then '3. 3 Недели'
    when (:pDate1-1) - t.NextPaydate >= 23 and (:pDate1-1) -  t.NextPaydate < d.dz30
      then '4. 4 Недели'
    when (:pDate1-1) - t.NextPaydate >= d.dz30 and (:pDate1-1) -  t.NextPaydate < d.dz90
      then '5. свыше 30 дней'
    when (:pDate1-1) - t.NextPaydate >= d.dz90 and (:pDate1-1) -  t.NextPaydate < d.dz365
      then '6. свыше 90 дней'
    when (:pDate1-1) - t.NextPaydate >= d.dz365
      then '7. свыше 1 года'
  end GrDayDZ,
  t.AgrAgent,
  t.emplname,
  t.DeptName,
  t.MainDeptName,
  t.SaleChannel,
  t.BSO,
  a.code,
  t.BSOcross,
  case when  t.NextPaydate > :pDate1-1 then t.dz end Overdue,
  t.dz1_12,
  Case
    when  t.NextPaydate > :pDate1-1 and t.amountf> t.dz1_12 or
         ( t.agrsign between  trunc(add_months(:pDate1,-1),'MONTH') and :pDate1-1 and
           (case
              when (t.agrsign between trunc(add_months(:pDate1,-1),'MONTH') and :pDate1-1)
                then (select min(datepay)
                        from agrsum
                       where agrisn = t.agrisn
                         and classisn2 in (cnt.ISN('amInsPrem'), cnt.ISN('amRePremiumIn'), cnt.ISN('amRePremiumInStorno'))
                         and discr = 'G'
                         and datepay >=  :pDate1)
                  else  t.NextPaydate
            end) between :pDate1 and trunc(add_months(:pDate1,1),'MONTH')-1)
      then t.dz
  end UndisclosedDZ1_12,

  t.agrend,
  t.AgrCreated,
  t.EndMonthAgrBeg,
  (select f.remark from AgrFlow f where f.agrisn = a.isn and f.ClassISN = 220894 and f.CREATEDBY in (1445912, 3141592)
                  and f.created = (select max(ar.created) from AgrFlow ar where f.agrisn = ar.agrisn and ar.ClassISN   = 220894 and ar.CREATEDBY in (3141592,1445912))) remark,
  s.fullname
from  maintab t
left join DZ d on d.agrisn = t.agrisn
left join agreement a on a.isn = t.agrisn
left join agrrole r on r.agrisn = t.agrisn and r.classisn = 2083
left join subject s on s.isn = r.subjisn
";
        $AgrISN = null;
        $DeptISN = 1445781;
        $EmplISN = null;
        $ProductISN = 221711;
        $AgrClass = null;
        $RoleClass = null;
        $RoleSubj = null;
        $Jur = "'Y'";
        $Date1 = "to_date('01.10.2020', 'dd.mm.yyyy')";
        $DateSign1 = null;
        $DateSign2 = null;
        $DateBeg1  = "to_date('11.09.2020', 'dd.mm.yyyy')";
        $DateBeg2  = "to_date('20.09.2020', 'dd.mm.yyyy')";
        $DateEnd1  = null;
        $DateEnd2  = null;

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

        $result = $this->execute($sql);
        dd($result);
        return view('oracle.DZnewGani', compact('result'));
    }


}
