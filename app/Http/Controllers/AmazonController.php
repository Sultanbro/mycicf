<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;

class AmazonController extends Controller
{
    public function client(){
        ini_set('max_execution_time', -1);
        $start = time();
        $query = "with Client as (
              Select  iin,clientisn,sex,Age,
              case when Email is not null then 1 else 0 end Email,case when Mobile is not null then 1 else 0 end Mobile,
              LK,Scorring,Experience,InsuredDMS,SubjDMS,sum(VTS) VTS,sum(Cros) Cros,sum(MST) MST,sum(Kasko) Kasko,sum(DKSP) DKSP
              from (
                    Select Distinct
                           s.iin,a.clientisn,sh.sex,round((trunc(sysdate)-sh.birthday)/365,0) Age,
                           nvl(p.phone,p1.phone) Email, nvl(nvl(p2.phone,p3.phone),p4.phone) Mobile, case when wr.isn is not null then 1 else 0 end LK,
                           decode(
                           (select count(*) from SubDoc where SubjISN = a.clientisn and ClassISN in (Cnt.ISN('kdVOV'),Cnt.ISN('kdEqualVOV'),Cnt.ISN('kdPension'),Cnt.ISN('kdInvalid1'),Cnt.ISN('kdInvalid2'))),
                            0, '', 'льгота'
                            ) Scorring,
                            round((trunc(sysdate)-(Select min(z.datesign) from agreement z where z.clientisn = a.clientisn and z.status in ('В','Д','Щ')))/365,0) Experience,
                            '' InsuredDMS,''SubjDMS,
                            nvl(sum(Case when a.productisn = 221711 then 1 else 0 end),0) VTS,
                            Case when (Select count(1) from agreement a2 where a2.crossisn = a.isn and a2.status in ('В','Д','Щ')) > 0 then 1 else 0 end Cros,
                            nvl(sum(Case when a.productisn in (474111,661341,821031) then 1 else 0 end),0) MST,
                            nvl(sum(Case when a.productisn in (670181,448631,474131,829401,474931,471541,856601) then 1 else 0 end),0) Kasko,
                            nvl(sum(Case when a.productisn = 482671 then 1 else 0 end),0) DKSP
                    from agreement a
                    join Subject s      on s.isn  = a.clientisn and s.juridical = 'N' and length(s.iin) = 12 and s.iin <> '000000000000'
                    join Subhuman sh    on sh.isn = s.isn
                    left join SUBPHONE p     on p.subjisn  = s.isn
                                                and p.classisn  = cnt.isn('cContactEmail') 
                                                and p.isn = (Select max(pp.isn) from SUBPHONE pp where pp.subjisn = p.subjisn and pp.classisn  = cnt.isn('cContactEmail'))
                    left join SUBPHONE p1     on p1.subjisn  = s.isn
                                                and p1.classisn  = cnt.isn('cContactEmail') 
                                                and p1.isn = (Select max(pp.isn) from SUBPHONE pp where pp.subjisn = p1.subjisn and pp.classisn  = cnt.isn('cContactEmailWork'))
                    left join SUBPHONE p2    on p2.subjisn = s.isn
                                                and p2.classisn = cnt.isn('cContactPhoneMobile')
                                                and p2.isn = (Select max(pp.isn) from SUBPHONE pp where pp.subjisn = p2.subjisn and pp.classisn  = cnt.isn('cContactPhoneMobile'))
                    left join SUBPHONE p3    on p3.subjisn = s.isn
                                                and p3.classisn = cnt.isn('cContactPhoneLink')
                                                and p3.isn = (Select max(pp.isn) from SUBPHONE pp where pp.subjisn = p3.subjisn and pp.classisn  = cnt.isn('cContactPhoneLink'))
                    left join SUBPHONE p4    on p4.subjisn = s.isn
                                                and p4.classisn = cnt.isn('cContactPhoneSMS')
                                                and p4.isn = (Select max(pp.isn) from SUBPHONE pp where pp.subjisn = p4.subjisn and pp.classisn  = cnt.isn('cContactPhoneSMS'))
                    left join WEBUSER wr     on wr.isn = s.isn
                              
                    where a.datesign /*> trunc(sysdate) - 60*/between to_date('01.03.2020','dd.mm.yyyy') and to_date('31.03.2020','dd.mm.yyyy')
                      and a.status in ('В','Д','Щ')
                      and a.productisn in (221711,474111,661341,821031,482671,670181,448631,474131,829401,474931,471541,856601)
                      and not exists (select 1 from AgrObject ao, AgrObjCar c where ao.AgrISN = a.isn and ao.ISN = c.ISN and c.territoryisn in (172834,172835))
                      --and a.id = '1303C439684J'
                      --and a.clientisn = 3268873
                    Group by s.iin,a.clientisn,sh.sex,sh.birthday,p.phone,p1.phone,p2.phone,p3.phone,p4.phone,wr.isn,a.isn
                     )
                  Group by iin,clientisn,sex,Age,Email,Mobile,LK,Scorring,Experience,InsuredDMS,SubjDMS
             ),
Zadachi as  (
            Select cl.ClientISN, trunc(se.datebeg) SubDate,di.fullname category,di1.fullname className
            from SubEvent se
            join Client cl on cl.clientISN = se.subjisn
            join Dicti di  on di.isn       = se.categoryisn
            join Dicti di1 on di1.isn      = se.classisn
            where se.isn = (Select max(se1.isn) from SubEvent se1 where se1.subjisn = se.subjisn)
            ),
FinRez as   (
                          -- суммы по договорам (начало)
              select
                (PremPaid + PremDebt) - (RetsPaid + RetsDebt) PremSum,
                LossPaid + LossDebt Loss,
                (PremPaid - RetsPaid - LossPaid + RegrPaid) 
                + (PremDebt - RetsDebt - LossDebt + RegrDebt) Balance,
                round(((PremPaid - RetsPaid - LossPaid + RegrPaid) 
                + (PremDebt - RetsDebt - LossDebt + RegrDebt))/decode(Experience,0,1,Experience),0) meanSum,
                ClientISN
              from (

              select
                cl.Experience,cl.ClientISN,
                nvl(sum( case when (t.SumType = 'Prem') and (s.Discr = 'F')
                              then s.Amount * t.SumSign
                              else 0
                          end
                       ), 0
                   ) PremPaid,
                nvl(sum( case when (t.SumType = 'Prem') and (s.Discr = 'P')
                              then s.Amount * t.SumSign
                              when (t.SumType = 'Prem') and (s.Discr = 'F')
                              then -1 * s.Amount * t.SumSign
                              else 0
                         end
                       ), 0
                   ) PremDebt,
                nvl(sum( case when (t.SumType = 'RetsPay') and (s.Discr = 'F')
                              then s.Amount * t.SumSign
                              else 0
                         end
                       ), 0
                   ) RetsPaid,
                nvl(sum( case when (t.SumType = 'Rets') and (s.Discr = 'P') and (nvl(r.Status, '-') not in ('A', 'Y', 'R', 'S'))
                              then s.Amount * t.SumSign
                              when (t.SumType = 'RetsPay') and (s.Discr = 'F') and (nvl(r.Status, '-') not in ('A', 'Y', 'R', 'S'))
                              then -1 * s.Amount * t.SumSign
                              else 0
                         end
                       ), 0
                   ) RetsDebt,
                nvl(sum( case when (t.SumType = 'LossPay') and (s.Discr = 'F')
                              then s.Amount * t.SumSign
                              else 0
                         end
                       ), 0
                   ) LossPaid,
                nvl(sum( case when (t.SumType = 'Loss') and (s.Discr = 'P') and (nvl(r.Status, '-') not in ('A', 'Y', 'R', 'S'))
                              then s.Amount * t.SumSign
                              when (t.SumType = 'LossPay') and (s.Discr = 'F') and (nvl(r.Status, '-') not in ('A', 'Y', 'R', 'S'))
                              then -1 * s.Amount * t.SumSign
                              else 0
                         end
                       ), 0
                   ) LossDebt,
                nvl(sum( case when (t.SumType = 'Loss') and (s.Discr = 'F') and nvl(r.RespondISN, 0)>0
                              then s.Amount * t.SumSign
                              else 0
                         end
                       ), 0
                   ) RegrPaid,
                nvl(sum( case when (t.SumType = 'Loss') and (s.Discr = 'P') and (nvl(r.Status, '-') not in ('A', 'Y', 'R', 'S')) and nvl(r.RespondISN, 0)>0
                              then s.Amount * t.SumSign
                              when (t.SumType = 'LossPay') and (s.Discr = 'F') and (nvl(r.Status, '-') not in ('A', 'Y', 'R', 'S')) and nvl(r.RespondISN, 0)>0
                              then -1 * s.Amount * t.SumSign
                              else 0
                         end
                       ), 0
                   ) RegrDebt
              from  ( select ISN SumTypeISN, 'Prem' SumType, 1 SumSign from Dicti 
                      where ISN in (Cnt.ISN('amInsPrem'), --Страховая премия 
                                    Cnt.ISN('amCoInsPrem'), --Состраховочная премия
                                    Cnt.ISN('amRePremiumIn'), --Премия (вх. re)
                                    Cnt.ISN('amCurrDiff'), --Курсовая по премии
                                    Cnt.ISN('amCurrDiffReIn'), --Курсовая разница re (вх.)
                                    Cnt.ISN('amSumDiff'), --Суммовая по премии
                                    Cnt.ISN('amSumDiffReIn') --Суммовая разница re (вх.) 
                                   )
                      union all
                      select ISN SumTypeISN, 'Prem' SumType,-1 SumSign from Dicti 
                      where ISN in (Cnt.ISN('amRePremiumInStorno'))--Премия (вх. re) сторно
                      union all
                      select ISN SumTypeISN, 'Rets' SumType, 1 SumSign from Dicti 
                      where ISN in (Cnt.ISN('amRefundPrem'), --Возврат премии
                                    Cnt.ISN('amReRefundPremIn') --Возврат премии (вх. re)
                                   )
                      union all
                      select ISN SumTypeISN, 'RetsPay' SumType, 1 SumSign from Dicti 
                      where ISN in (decode(Cnt.Code('constRefundPayPlanSum'), 'Y', Cnt.ISN('amRefundPremPay'), Cnt.ISN('amRefundPrem')), --Возврат премии/Выплата по возврату
                                    Cnt.ISN('amReRefundPremPartIn') -- Доля в возврате премии (вх. re)
                                   )
                      union all
                      select ISN SumTypeISN, 'Loss' SumType, 1 SumSign from Dicti 
                      where ISN in (Cnt.ISN('amRefundSum'), --Возмещение ущерба
                                    Cnt.ISN('amReRefundSumIn') --Возмещение ущерба (вх. re)
                                   )
                      union all
                      select ISN SumTypeISN, 'LossPay' SumType, 1 SumSign from Dicti 
                      where ISN in (decode(Cnt.Code('constRefundPayPlanSum'), 'Y', Cnt.ISN('amRefundSumPay'), Cnt.ISN('amRefundSum')), --Возмещение ущерба/Выплата по ущербу
                                    Cnt.ISN('amReRefundSumPartIn') --Доля в возмещение ущерба (вх. re)
                                   )
                    ) t,
                    AgrSum s, 
                    Agreement a,
                    AgrRefund r,
                    Client cl
              where (s.ClassISN2 = t.SumTypeISN)
                and (s.Acc = 'B')
                and (s.Discr in ('P', 'F'))
                and (s.DatePay <= sysdate)
                and (a.ISN = s.AgrISN)
                and (a.ClientISN = cl.ClientISN)
                and (r.ISN(+) = s.RefundISN)
              Group by cl.Experience,cl.ClientISN
              )
          )
Select rownum,cl.iin,cl.sex,cl.Age,cl.Email,cl.Mobile,cl.Lk,cl.Scorring,cl.Experience,cl.InsuredDMS,cl.SubjDMS,
       zd.SubDate,zd.category,zd.className,
       fr.PremSum,fr.loss,fr.Balance,fr.meanSum,
       case when cl.VTS   > 0 then 1 else 0 end VTS,
       case when cl.Cros  > 0 then 1 else 0 end Cros,
       case when cl.Kasko > 0 then 1 else 0 end Kasko,
       case when cl.MST   > 0 then 1 else 0 end MST,
       case when cl.DKSP  > 0 then 1 else 0 end DKSP,
       cl.clientisn,'CNTR' Company
from Client cl
join Zadachi zd on zd.clientisn = cl.clientisn
join FinRez fr  on fr.clientISN = cl.clientisn";
        $result = DB::connection('oracle')->select($query);
        $end = time();
        echo $start-$end;
        $this->temp($result, 'client');
    }

    public function claim(){
        $query = "
    with qustom as (
    Select s.iin,a.id AgrID,di.fullname Product,cl.id ClaimId,count(rf.isn) cntRf,
    case when cl.status = 'Y' then 'Урегулирован'
         when cl.status = 'U' then 'Подписан'
         when cl.status = 'N' then 'Рассмотрение'
         when cl.status = 'D' then 'Оформление'
         when cl.status = 'P' then 'На подписи'
    end Status,
    case when cl.status = 'Y' then cl.refundsum else cl.claimsum end ClaimSum,
    a.clientisn,'CNTR' Company
    from agreement a
    join Subject s      on s.isn = a.clientisn and s.juridical = 'N' and length(s.iin) = 12 and s.iin <> '000000000000'
    join Dicti di       on di.isn = a.productisn
    join Agrclaim  cl   on cl.agrisn   = a.isn and cl.status not in ('R','S','A')
    join Agrrefund rf   on rf.claimisn = cl.isn
    where a.datesign /*> trunc(sysdate) - 60*/between to_date('01.01.2020','dd.mm.yyyy') and to_date('31.03.2020','dd.mm.yyyy')
      and a.status in ('В','Д','Щ')
      and a.productisn in (221711,474111,661341,821031,482671,670181,448631,474131,829401,474931,471541,856601)
      and not exists (select 1 from AgrObject ao, AgrObjCar c where ao.AgrISN = a.isn and ao.ISN = c.ISN and c.territoryisn in (172834,172835))
    Group by s.iin,a.id,di.fullname,cl.id,cl.status,cl.claimsum,cl.refundsum,a.clientisn
    )
    Select rownum, q.*
from qustom q";
        $result = DB::connection('oracle')->select($query);
        $this->temp($result, 'claim');
    }

    public function dksp(){
        $query = "Select rownum,
      s.iin,a.id AgrID, /*a.datesign,*/to_char(a.datesign,'yyyy-mm-dd') datesign,
      di.fullname PurposeTrip,
      Attr_Utils.GetAddAttrC(220565,682151,a.isn) departure,
      Attr_Utils.GetAddAttrC(220565,682161,a.isn) arrival,
      Agr_Utils.GetAgrPremiumSum(a.isn) PremF,
      a.dateend-a.datebeg CntDay,
      Case when a.emplisn   = 3990862 then 'сайт'
           when a.emplisn   <> 3990862 and a.systemisn = 515431 then 'партнеры'
           when l.classisn = 198490  then 'прямые'
        else'агентские'
      end Chanel,
      (Select count(1) from Docs d where d.refagrisn = a.isn and d.classisn = cnt.isn('dtComissionAgr') and d.statusisn = 2518) KV,
      Subj_Utils.GetSubjDeclensionCaseName(a.deptisn) DeptName,
      Case when a.emplisn = 3990862 or a.systemisn = 515431 then 'безналичные' else 'наличные' end TypePay,
      (Select count(1) from Agrclaim cl where cl.agrisn = a.isn and cl.classisn = 2884 and cl.status <> 'A') CntClaim,
      a.clientisn,'CNTR' Company,
      Case when r.isn is null then 1 else 0 end EPointOfSale
from Agreement a
join Subject s         on s.isn = a.clientisn and s.juridical = 'N' and length(s.iin) = 12 and s.iin <> '000000000000'
left join RsDept2 r    on r.isn = a.deptisn and r.active = 'Y'
left join SubAddr sr   on sr.Subjisn = r.isn
left join City tn      on tn.isn = sr.cityisn
left join Dicti di     on di.isn = Attr_Utils.GetAddAttrN(220565,482701,a.isn)
left join AgrClause l  on l.agrisn = a.isn and l.clauseisn = 11110
where a.datesign /*> trunc(sysdate) - 60*/between to_date('01.01.2020','dd.mm.yyyy') and to_date('31.03.2020','dd.mm.yyyy')
      and a.status in ('В','Д','Щ')
      and a.productisn in (482671) -- DKSP
      --and a.isn = 4862887--4863035";
        $result = DB::connection('oracle')->select($query);
        $this->temp($result, 'dksp');
    }

    public function mst(){
        $query = "Select rownum,
      s.iin,a.id AgrID,a.Datesign,
      REGEXP_REPLACE(di.fullname,'(\W)[a-z]*', '') Territory,
      (Select min(c.riskname) from Agrcond c where c.agrisn = a.isn) PurposeTrip,
      Agr_Utils.GetAgrPremiumSum(a.isn) PremF,
      a.dateend-a.datebeg CntDay,
      Case when a.emplisn   = 3990862 then 'сайт'
           when a.emplisn   <> 3990862 and a.systemisn = 515431 then 'партнеры'
           when l.classisn = 198490  then 'прямые'
           when l.classisn = 198390   and a.systemisn <> 515431 then 'агентские'
      end Chanel,
      (Select count(1) from Docs d where d.refagrisn = a.isn and d.classisn = cnt.isn('dtComissionAgr') and d.statusisn = 2518) KV,
      Subj_Utils.GetSubjDeclensionCaseName(a.deptisn) DeptName,
      Case when a.emplisn = 3990862 or a.systemisn = 515431 then 'безналичные' else 'наличные' end TypePay,
      (Select count(1) from Agrclaim cl where cl.agrisn = a.isn and cl.classisn = 2884 and cl.status <> 'A') CntClaim,
      a.Clientisn,'CNTR' Company,
      Case when r.isn is null then 1 else 0 end EPointOfSale
from Agreement a
join Subject s         on s.isn = a.clientisn and s.juridical = 'N' and length(s.iin) = 12 and s.iin <> '000000000000'
left join RsDept2 r    on r.isn = a.deptisn and r.active = 'Y'
left join SubAddr sr   on sr.Subjisn = r.isn
left join City tn      on tn.isn = sr.cityisn
left join AgrClause l  on l.agrisn = a.isn and l.clauseisn = 11110
left join AgrClause l1 on l1.agrisn = a.isn and l1.clauseisn = 13100
left join Dicti di     on di.isn = l1.classisn
where a.datesign between to_date('01.01.2020','dd.mm.yyyy') and to_date('31.03.2020','dd.mm.yyyy')
      and a.status in ('В','Д','Щ')
      and a.productisn in (474111,661341,821031)";
        $result = DB::connection('oracle')->select($query);
        $this->temp($result, 'mst');
    }

    public function vts(){
        $query = "with Agr as (
          Select
                s.iin,a.id AgrID, a.isn AgrISN,a.Clientisn,di.numcode ClientKBM,
                (Select count(car.isn) from Agrobject ob join Agrobjcar car on car.isn = ob.isn where ob.Agrisn = a.isn) cntCar,
                a.Datesign,
                Case when nvl(a.datedenounce,a.Dateend) > trunc(sysdate) then 1 else 0 end VtsExisting,
                Agr_Utils.GetAgrPremiumSum(a.isn) PremF,
                Case when a.emplisn = 3990862 or a.systemisn = 515431 then 'безналичные' else 'наличные' end TypePay,
                Case when a.emplisn = 3990862 then 'Сайт'
                     when r.isn     is null   then 'Алматы'
                  else tn.name
                end PointOfSale,
                Case when a.emplisn   = 3990862 then 'сайт'
                     when a.emplisn   <> 3990862 and a.systemisn = 515431 then 'партнеры'
                     when l.classisn = 198490  then 'прямые'
                     when l.classisn = 198390   and a.systemisn <> 515431 then 'агентские'
                end Chanel,
                (Select count(1) from Docs d where d.refagrisn = a.isn and d.classisn = cnt.isn('dtComissionAgr') and d.statusisn = 2518) KV,
                Subj_Utils.GetSubjDeclensionCaseName(a.deptisn) DeptName,
                nvl(Attr_Utils.GetAddAttrN(220565,868981,a.isn),0) DiscountPerc,
                Case when (Select count(1) from agreement a2 where a2.crossisn = a.isn and a2.status in ('В','Д','Щ')) > 0 then 1 else 0 end Cros,
                nvl((Select sum(Agr_Utils.GetAgrPremiumSum(a3.isn))/count(1) from agreement a3 where a3.crossisn = a.isn and a3.status in ('В','Д','Щ')),0) CrosChek,
                (Select count(1) from Agrclaim cl where cl.agrisn = a.isn and cl.classisn = 2884 and cl.status <> 'A') CntClaim,
                Case when r.isn is null then 1 else 0 end EPointOfSale
          from Agreement a
          join Subject s         on s.isn = a.clientisn and s.juridical = 'N' and length(s.iin) = 12 and s.iin <> '000000000000'
          left join Agrrole ar        on a.isn = ar.Agrisn and ar.classisn = 2085 and ar.Subjisn = a.clientisn
          left join Dicti di on di.isn = ar.bonusmalusisn and di.parentisn = 2670 and di.active = 'N'
          left join RsDept2 r    on r.isn = a.deptisn and r.active = 'Y'
          left join SubAddr sr   on sr.Subjisn = r.isn
          left join City tn      on tn.isn = sr.cityisn
          left join AgrClause l  on l.agrisn = a.isn and l.clauseisn = 11110
          where a.datesign /*> trunc(sysdate) - 60*/between to_date('01.01.2020','dd.mm.yyyy') and to_date('31.03.2020','dd.mm.yyyy')
                and a.status in ('В','Д','Щ')
                and a.productisn = 221711
                and not exists (select 1 from AgrObject ao, AgrObjCar c where ao.AgrISN = a.isn and ao.ISN = c.ISN and c.territoryisn in (172834,172835))
                --and a.isn = 4862887--4863035
        ),
KBM as (
        Select ar.Agrisn, a.ClientKBM, count(ar.subjisn) CntLDU,min(di.numcode) MinKBM
        from Agrrole ar
        join Agr a on a.AgrISN = ar.Agrisn
        join Dicti di on di.isn = ar.bonusmalusisn and di.parentisn = 2670 and di.active = 'N'
        where ar.classisn = 2085
        Group by ar.Agrisn,a.ClientKBM
       ),
TS as (
       Select a.AgrISN,di1.Fullname Marka, di.fullname Model, to_char(car.releasedate,'yyyy') ReleaseDate, ci.name Territory, car.regno
       from Agrobject ob
       join Agr a on a.AgrISN = ob.Agrisn
       join Agrobjcar car on car.isn = ob.isn
       join Dicti di  on di.isn  = car.modelisn
       join Dicti di1 on di1.isn = di.parentisn
       join City ci   on ci.isn  = car.territoryisn
       where car.releasedate = (Select max(car1.releasedate)
                                from Agrobject ob1
                                join Agrobjcar car1 on car1.isn = ob1.isn
                                where ob1.agrisn = ob.Agrisn)
             and car.isn  = (Select min(car1.isn)
                                from Agrobject ob1
                                join Agrobjcar car1 on car1.isn = ob1.isn
                                where ob1.agrisn = ob.Agrisn)
      )
Select rownum,ag.IIN,ag.AgrID,ag.Datesign,ag.VtsExisting,ag.ClientKBM,k.CntLDU,k.MinKBM,
       ag.cntCar,t.Marka,t.Model,t.ReleaseDate,t.Territory,t.regno,
       ag.PremF,ag.TypePay,ag.PointOfSale,ag.Chanel,ag.KV,ag.DeptName,ag.DiscountPerc,ag.Cros,ag.CrosChek,ag.CntClaim,ag.Clientisn,'CNTR' Company,ag.EPointOfSale
from Agr ag
join KBM k on k.AgrISN = ag.AgrISN
join TS  t on t.AgrISN = ag.AgrISN";
        $result = DB::connection('oracle')->select($query);
        $this->temp($result, 'vts');
    }

    public function kasko(){
        $query = "with Agr as (
          Select --count(1)
                s.iin,a.id AgrID, a.isn AgrISN,a.Clientisn,a.datesign,
                Agr_Utils.GetAgrPremiumSum(a.isn) PremF,
                Case when a.emplisn = 3990862 or a.systemisn = 515431 then 'безналичные' else 'наличные' end TypePay,
                Case when a.emplisn   = 3990862 then 'сайт'
                     when a.emplisn   <> 3990862 and a.systemisn = 515431 then 'партнеры'
                     when l.classisn = 198490  then 'прямые'
                     when l.classisn = 198390   and a.systemisn <> 515431 then 'агентские'
                end Chanel,
                (Select count(1) from Docs d where d.refagrisn = a.isn and d.classisn = cnt.isn('dtComissionAgr') and d.statusisn = 2518) KV,
                Subj_Utils.GetSubjDeclensionCaseName(a.deptisn) DeptName,
                case when a.productisn in (474131,829401) then 1 else 0 end PledgeKasko,
                (Select count(1) from Agrclaim cl where cl.agrisn = a.isn and cl.classisn = 2884 and cl.status <> 'A') CntClaim,
                Case when r.isn is null then 1 else 0 end EPointOfSale
          from Agreement a
          join Subject s         on s.isn = a.clientisn and s.juridical = 'N' and length(s.iin) = 12 and s.iin <> '000000000000'
          left join RsDept2 r    on r.isn = a.deptisn and r.active = 'Y'
          left join SubAddr sr   on sr.Subjisn = r.isn
          left join City tn      on tn.isn = sr.cityisn
          left join AgrClause l  on l.agrisn = a.isn and l.clauseisn = 11110
          where a.datesign > trunc(sysdate) - 60
                and a.status in ('В','Д','Щ')
                and a.productisn in (SELECT t.isn FROM Dicti t where t.active in ('N','Y') CONNECT BY PRIOR t.isn = 2043 START WITH t.parentisn = 2043)
                --and a.isn = 4862887--4863035
        ),

TS as (
       Select a.AgrISN,di1.Fullname Marka, di.fullname Model, to_char(car.releasedate,'yyyy') ReleaseDate,ci.name Territory, car.regno
       from Agrobject ob
       join Agr a on a.AgrISN = ob.Agrisn
       join Agrobjcar car on car.isn = ob.isn
       join Dicti di  on di.isn  = car.modelisn
       join Dicti di1 on di1.isn = di.parentisn
       left join City ci   on ci.isn  = car.territoryisn
       where car.releasedate = (Select max(car1.releasedate)
                                from Agrobject ob1
                                join Agrobjcar car1 on car1.isn = ob1.isn
                                where ob1.agrisn = ob.Agrisn)
             and car.isn  = (Select min(car1.isn)
                                from Agrobject ob1
                                join Agrobjcar car1 on car1.isn = ob1.isn
                                where ob1.agrisn = ob.Agrisn)
      )
Select rownum,ag.IIN,ag.AgrID,ag.datesign,
       t.Marka,t.Model,t.ReleaseDate, t.Territory, t.regno,
       ag.PremF,ag.Chanel,ag.KV,ag.DeptName,ag.PledgeKasko,ag.TypePay,ag.CntClaim,ag.Clientisn,'CNTR' Company,ag.EPointOfSale
from Agr ag
join TS  t on t.AgrISN = ag.AgrISN";
        $result = DB::connection('oracle')->select($query);
        $this->temp($result, 'kasko');
    }
    public function test(){
        ini_set('memory_limit', '4000M');
        ini_set('max_execution_time', '-1');
        $query = "select * from inslab.subject s
                  where s.isn = 3921599";
        $result = DB::connection('oracle')->select($query);
        dd($result);
        $this->temp($result, 'AgrClause_7');
    }

    public function export($data, $filename)
    {
        $headers = array(
            "Content-type" => "text/csv; charset=utf-8",
            "Content-Disposition" => "attachment; filename=$filename.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
//        header("Content-type : text/csv; charset=utf-8");
//        header("Content-Disposition : attachment; filename=$filename.csv");
//        header("Pragma : no-cache");
//        header("Cache-Control : must-revalidate, post-check=0, pre-check=0");
//        header("Expires : 0");

        dd(array_keys((array)$data[0]));
        $file = fopen('php://output', 'w');
        fputcsv($file, array_keys((array)$data[0]));
        foreach($data as $row) {
            $putData = [];
            foreach (array_keys((array)$data[0]) as $key ){
                array_push($putData, $row->$key);
            }
            fputcsv($file, $putData);
        }
        fclose($file);
        echo $file;
//        return \response()->download($filePlace, "$filename.csv", $headers);
    }

    public function temp($data, $type){
        $filename = $type."_data_export_" . date("Y-m-d") . ".csv";
        // disable caching
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        // force download
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");

        $df = fopen("php://output", 'w');
        fputcsv($df, array_keys((array)$data[0]), ';');
        foreach ($data as $row) {
            fputcsv($df, $this->getRow($row),';');
        }
        fclose($df);
        die();
    }

    public function getRow($row){
        $data = [];
        foreach ($row as $r){
            array_push($data, $r);
        }
        return $data;
    }

    public function storage(){
        $a = Storage::disk('s3')->files();
        dd($a);
    }
}
