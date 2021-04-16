<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Answer
 *
 * @property int $id
 * @property string $value
 * @property int $question_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Answer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Answer whereValue($value)
 */
	class Answer extends \Eloquent {}
}

namespace App{
/**
 * App\Booking
 *
 * @property int $id
 * @property int|null $author
 * @property mixed|null $data
 * @property string|null $to
 * @property string|null $from
 * @property string|null $title
 * @property string|null $office
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Booking onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereOffice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Booking withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Booking withoutTrashed()
 */
	class Booking extends \Eloquent {}
}

namespace App{
/**
 * Class Branch
 *
 * @property $fullname string
 * @property $kias_id int
 * @property $kias_parent_id int
 * @property $has_child int
 * @property $verified int
 * @property $duty string
 * @package App
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $birthday
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Branch[] $childs
 * @property-read int|null $childs_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereDuty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereHasChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereKiasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereKiasParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereVerified($value)
 */
	class Branch extends \Eloquent {}
}

namespace App{
/**
 * App\Cabinet
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cabinet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cabinet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cabinet query()
 */
	class Cabinet extends \Eloquent {}
}

namespace App{
/**
 * Class Centcoin
 *
 * @package App
 * @property integer $user_isn
 * @property integer $centcoins
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Branch $branch
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CentcoinHistory[] $fullInfo
 * @property-read int|null $full_info_count
 * @property-read \App\CentcoinHistory $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Centcoin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Centcoin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Centcoin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Centcoin whereCentcoins($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Centcoin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Centcoin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Centcoin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Centcoin whereUserIsn($value)
 */
	class Centcoin extends \Eloquent {}
}

namespace App{
/**
 * Class CentcoinHistory
 *
 * @package App
 * @property string $type
 * @property string $description
 * @property integer $quantity
 * @property string $operation_type
 * @property integer $total
 * @property integer $user_isn
 * @property integer $changed_user_isn
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory whereChangedUserIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory whereOperationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CentcoinHistory whereUserIsn($value)
 */
	class CentcoinHistory extends \Eloquent {}
}

namespace App{
/**
 * App\City
 *
 * @property int $id
 * @property int $isn
 * @property string $name
 * @property int $parentisn
 * @property string|null $parentname
 * @property string|null $regionisn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereParentisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereParentname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereRegionisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App{
/**
 * App\Comment
 *
 * @property int $id
 * @property string $text
 * @property int $post_id
 * @property int $user_isn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $email_send
 * @property int|null $answered_user_isn
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereAnsweredUserIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereEmailSend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUserIsn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Comment withoutTrashed()
 */
	class Comment extends \Eloquent {}
}

namespace App{
/**
 * App\Dicti
 *
 * @property int $id
 * @property int|null $isn
 * @property string $fullname
 * @property int|null $parent_isn
 * @property string|null $parent_name
 * @property string $condition_for_property
 * @property string|null $type
 * @property string $code
 * @property string $numcode
 * @property int $n_kids
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dicti[] $childs
 * @property-read int|null $childs_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereConditionForProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereNKids($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereNumcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereParentIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereParentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dicti whereUpdatedAt($value)
 */
	class Dicti extends \Eloquent {}
}

namespace App{
/**
 * App\Dictionary
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereUpdatedAt($value)
 */
	class Dictionary extends \Eloquent {}
}

namespace App{
/**
 * App\DocMethodCategory
 *
 * @property int $id
 * @property string $title Заголовок названия метода, например метод для получения справочника
 * @property string $category Категория, например Oktell, Bestsender
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DocMethodDescription[] $documents
 * @property-read int|null $documents_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodCategory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodCategory whereUpdatedAt($value)
 */
	class DocMethodCategory extends \Eloquent {}
}

namespace App{
/**
 * App\DocMethodDescription
 *
 * @property int $id
 * @property string $title Заголовок, например метод для поиска по справочнику
 * @property mixed $documentation Документация в JSON формате
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $doc_category_id
 * @property-read \App\DocMethodCategory $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodDescription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodDescription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodDescription query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodDescription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodDescription whereDocCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodDescription whereDocumentation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodDescription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodDescription whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocMethodDescription whereUpdatedAt($value)
 */
	class DocMethodDescription extends \Eloquent {}
}

namespace App{
/**
 * App\DocumentationStructure
 *
 * @property int $id
 * @property string $label
 * @property int $parent_id
 * @property string|null $url
 * @property string|null $icon_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentationStructure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentationStructure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentationStructure query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentationStructure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentationStructure whereIconUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentationStructure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentationStructure whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentationStructure whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentationStructure whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentationStructure whereUrl($value)
 */
	class DocumentationStructure extends \Eloquent {}
}

namespace App{
/**
 * App\ExpressProduct
 *
 * @property int $id
 * @property string $name
 * @property int $product_isn
 * @property int $ordinal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\FullConstructor $constr
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressProduct whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressProduct whereOrdinal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressProduct whereProductIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressProduct whereUpdatedAt($value)
 */
	class ExpressProduct extends \Eloquent {}
}

namespace App{
/**
 * App\ExpressQuotation
 *
 * @property int $id
 * @property int $product_isn
 * @property int $user_isn
 * @property int|null $sabj_isn
 * @property string|null $premiumSum
 * @property string|null $calc_isn
 * @property string|null $full_kias_id
 * @property string|null $full_id
 * @property string|null $full_isn
 * @property string|null $calc_id
 * @property string|null $data
 * @property string|null $docs
 * @property string $status_name
 * @property string $status
 * @property string|null $kias_id
 * @property string $calc_da
 * @property string $nshb
 * @property string|null $nshb_doc
 * @property string|null $nshb_id
 * @property string|null $nshb_request
 * @property int|null $nshb_request_id
 * @property string|null $nshb_status
 * @property string|null $nshb_status_name
 * @property string $tariff
 * @property string|null $remark
 * @property int $franch
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ExpressProduct $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereCalcDa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereCalcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereCalcIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereDocs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereFranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereFullId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereFullIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereFullKiasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereKiasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereNshb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereNshbDoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereNshbId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereNshbRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereNshbRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereNshbStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereNshbStatusName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation wherePremiumSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereProductIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereSabjIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereStatusName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereTariff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExpressQuotation whereUserIsn($value)
 */
	class ExpressQuotation extends \Eloquent {}
}

namespace App{
/**
 * App\FullConstructor
 *
 * @property int $id
 * @property int $product_id
 * @property int $product_isn
 * @property int $user_isn
 * @property string|null $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $parentisns
 * @property-read \App\ExpressProduct $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor whereParentisns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor whereProductIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullConstructor whereUserIsn($value)
 */
	class FullConstructor extends \Eloquent {}
}

namespace App{
/**
 * App\FullProduct
 *
 * @property int $id
 * @property string $name
 * @property int $product_isn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullProduct whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullProduct whereProductIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullProduct whereUpdatedAt($value)
 */
	class FullProduct extends \Eloquent {}
}

namespace App{
/**
 * App\FullQuotation
 *
 * @property int $id
 * @property int $product_isn
 * @property int $user_isn
 * @property int|null $sabj_isn
 * @property string|null $premiumSum
 * @property string|null $calc_isn
 * @property int|null $calc_id
 * @property string|null $DA_nomer
 * @property string|null $DA_isn
 * @property string|null $express_isn
 * @property int|null $express_id
 * @property string|null $data
 * @property string|null $docs
 * @property string|null $object_card
 * @property string $contract_number
 * @property string $status_name
 * @property string $status
 * @property string $calc_da
 * @property string|null $inspection_type
 * @property string|null $inspection_address
 * @property string|null $inspection_time
 * @property string|null $inspection_date
 * @property string|null $inspection_isn
 * @property string|null $kias_id
 * @property int|null $contract_begin_date Дата начала действия договора
 * @property int|null $contract_end_date Дата конца действия договора
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ExpressQuotation $express
 * @property-read \App\ExpressProduct $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereCalcDa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereCalcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereCalcIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereContractBeginDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereContractEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereContractNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereDAIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereDANomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereDocs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereExpressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereExpressIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereInspectionAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereInspectionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereInspectionIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereInspectionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereInspectionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereKiasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereObjectCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation wherePremiumSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereProductIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereSabjIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereStatusName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FullQuotation whereUserIsn($value)
 */
	class FullQuotation extends \Eloquent {}
}

namespace App{
/**
 * Class InsProduct
 *
 * @package App
 * @property string $product_name Название продукта
 * @property integer $product_isn ISN продукта
 * @property integer $product_class Класс страхования продукта
 * @property object $construction Атрибуты
 * @property int $id
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\InsProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct whereConstruction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct whereProductClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct whereProductIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InsProduct withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\InsProduct withoutTrashed()
 */
	class InsProduct extends \Eloquent {}
}

namespace App{
/**
 * App\InsuranceClasses
 *
 * @property int $id
 * @property int $class_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceClasses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceClasses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceClasses query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceClasses whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceClasses whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceClasses whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceClasses whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceClasses whereUpdatedAt($value)
 */
	class InsuranceClasses extends \Eloquent {}
}

namespace App{
/**
 * App\InsuranceCompany
 *
 * @property int $id
 * @property string $full_name
 * @property string $short_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceCompany newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceCompany newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceCompany query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceCompany whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceCompany whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceCompany whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceCompany whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceCompany whereUpdatedAt($value)
 */
	class InsuranceCompany extends \Eloquent {}
}

namespace App{
/**
 * App\InsuranceProduct
 *
 * @property int $id
 * @property string $full_name
 * @property string $short_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceProduct whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceProduct whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InsuranceProduct whereUpdatedAt($value)
 */
	class InsuranceProduct extends \Eloquent {}
}

namespace App{
/**
 * App\KolesaMarks
 *
 * @property int $id
 * @property int $mark_id
 * @property string $mark_label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaMarks newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaMarks newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaMarks query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaMarks whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaMarks whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaMarks whereMarkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaMarks whereMarkLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaMarks whereUpdatedAt($value)
 */
	class KolesaMarks extends \Eloquent {}
}

namespace App{
/**
 * App\KolesaModel
 *
 * @property int $id
 * @property int $parent_id
 * @property int $model_id
 * @property string $model_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaModel whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaModel whereModelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaModel whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaModel whereUpdatedAt($value)
 */
	class KolesaModel extends \Eloquent {}
}

namespace App{
/**
 * App\KolesaPrices
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $mark_id
 * @property string $model_id
 * @property string $year
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices whereMarkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KolesaPrices whereYear($value)
 */
	class KolesaPrices extends \Eloquent {}
}

namespace App{
/**
 * Class Kurators
 *
 * @property integer $user_isn ISN таргета
 * @property integer $permission_id ID уровня доступа
 * @package App
 * @property int $id
 * @property int $dept_isn
 * @property string $type
 * @property int $changer
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Kurators onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators whereChanger($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators whereDeptIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kurators whereUserIsn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Kurators withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Kurators withoutTrashed()
 */
	class Kurators extends \Eloquent {}
}

namespace App{
/**
 * App\Like
 *
 * @property int $id
 * @property int $user_isn
 * @property int $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like whereUserIsn($value)
 */
	class Like extends \Eloquent {}
}

namespace App{
/**
 * App\Notification
 *
 * @property int $id
 * @property int $user_isn
 * @property string $doc_no
 * @property string $doc_type
 * @property string $sendDate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereDocNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereDocType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereSendDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereUserIsn($value)
 */
	class Notification extends \Eloquent {}
}

namespace App{
/**
 * App\ParseBalance
 *
 * @property int $id
 * @property int $month
 * @property int $year
 * @property int $company_id
 * @property float $actives
 * @property float $cash
 * @property float $deposits
 * @property float $securities
 * @property float $rev_repo
 * @property float $OS
 * @property float $NMA
 * @property float $ins_dz
 * @property float $other_dz
 * @property float $other_actives
 * @property float $liability
 * @property float $repo
 * @property float $reins_calcs
 * @property float $middleman_calcs
 * @property float $invoices_to_pay
 * @property float $other_credits
 * @property float $other_liability
 * @property float $reserves
 * @property float $rnp
 * @property float $rznu
 * @property float $rpnu
 * @property float $capital
 * @property float $authorized_capital
 * @property float $other_rezerves
 * @property float $retained_earnings
 * @property float $current_period
 * @property float $last_years
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereActives($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereAuthorizedCapital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereCapital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereCurrentPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereDeposits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereInsDz($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereInvoicesToPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereLastYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereLiability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereMiddlemanCalcs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereNMA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereOS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereOtherActives($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereOtherCredits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereOtherDz($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereOtherLiability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereOtherRezerves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereReinsCalcs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereRepo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereReserves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereRetainedEarnings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereRevRepo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereRnp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereRpnu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereRznu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereSecurities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseBalance whereYear($value)
 */
	class ParseBalance extends \Eloquent {}
}

namespace App{
/**
 * App\ParseFinance
 *
 * @property int $id
 * @property int $company_id
 * @property int $month
 * @property int $year
 * @property float $assets
 * @property float $insurance_reserves
 * @property float $equity
 * @property float $authorized_capital
 * @property float $retained_earnings
 * @property float $insurance_premium
 * @property float $insurance_payouts
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereAssets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereAuthorizedCapital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereEquity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereInsurancePayouts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereInsurancePremium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereInsuranceReserves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereRetainedEarnings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseFinance whereYear($value)
 */
	class ParseFinance extends \Eloquent {}
}

namespace App{
/**
 * App\ParseInfo
 *
 * @property int $id
 * @property int $company_id
 * @property int $month
 * @property int $year
 * @property string $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseInfo whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseInfo whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseInfo whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseInfo whereYear($value)
 */
	class ParseInfo extends \Eloquent {}
}

namespace App{
/**
 * App\ParseOpu
 *
 * @property int $id
 * @property int $month
 * @property int $year
 * @property int $company_id
 * @property float $dsd
 * @property float $brut_prem
 * @property float $own_ret
 * @property float $ins_expense
 * @property float $net_payout
 * @property float $lost_perc
 * @property float $av
 * @property float $av_perc
 * @property float $net_ins_income
 * @property float $adm_expenses
 * @property float $fot
 * @property float $fot_dsd
 * @property float $fin_result
 * @property float $reserve_changes
 * @property float $fin_changes
 * @property float $invest_income
 * @property float $other_income
 * @property float $other_expenses
 * @property float $brut_income
 * @property float $kpn
 * @property float $net_income
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereAdmExpenses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereAv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereAvPerc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereBrutIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereBrutPrem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereDsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereFinChanges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereFinResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereFot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereFotDsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereInsExpense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereInvestIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereKpn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereLostPerc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereNetIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereNetInsIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereNetPayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereOtherExpenses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereOtherIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereOwnRet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereReserveChanges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseOpu whereYear($value)
 */
	class ParseOpu extends \Eloquent {}
}

namespace App{
/**
 * App\ParsePayout
 *
 * @property int $id
 * @property int $company_id
 * @property int $product_id
 * @property int $month
 * @property int $year
 * @property float $sum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePayout whereYear($value)
 */
	class ParsePayout extends \Eloquent {}
}

namespace App{
/**
 * App\ParsePremium
 *
 * @property int $id
 * @property int $company_id
 * @property int $product_id
 * @property int $month
 * @property int $year
 * @property float $sum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParsePremium whereYear($value)
 */
	class ParsePremium extends \Eloquent {}
}

namespace App{
/**
 * App\ParseStandart
 *
 * @property int $id
 * @property int $company_id
 * @property int $month
 * @property int $year
 * @property float $sum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseStandart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseStandart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseStandart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseStandart whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseStandart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseStandart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseStandart whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseStandart whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseStandart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ParseStandart whereYear($value)
 */
	class ParseStandart extends \Eloquent {}
}

namespace App{
/**
 * App\PdfFiles
 *
 * @property int $id
 * @property string $file_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PdfFiles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PdfFiles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PdfFiles query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PdfFiles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PdfFiles whereFileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PdfFiles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PdfFiles whereUpdatedAt($value)
 */
	class PdfFiles extends \Eloquent {}
}

namespace App{
/**
 * Class Permissions
 *
 * @property integer $user_isn ISN таргета
 * @property integer $permission_id ID уровня доступа
 * @property integer $changer ISN пользователя
 * @package App
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permissions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permissions newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Permissions onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permissions query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permissions whereChanger($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permissions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permissions whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permissions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permissions wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permissions whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permissions whereUserIsn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permissions withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Permissions withoutTrashed()
 */
	class Permissions extends \Eloquent {}
}

namespace App{
/**
 * App\Post
 *
 * @property int $id
 * @property int $user_isn
 * @property string $post_text
 * @property int $pinned
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $from_kias
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereFromKias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePinned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePostText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUserIsn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Post withoutTrashed()
 */
	class Post extends \Eloquent {}
}

namespace App{
/**
 * App\PreviousName
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousName newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousName newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousName query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousName whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousName whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousName whereUpdatedAt($value)
 */
	class PreviousName extends \Eloquent {}
}

namespace App{
/**
 * App\PreviousProductName
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousProductName newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousProductName newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousProductName query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousProductName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousProductName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousProductName whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousProductName whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreviousProductName whereUpdatedAt($value)
 */
	class PreviousProductName extends \Eloquent {}
}

namespace App{
/**
 * App\Question
 *
 * @property int $id
 * @property string $question
 * @property int $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereUpdatedAt($value)
 */
	class Question extends \Eloquent {}
}

namespace App{
/**
 * App\RatingList
 *
 * @property int $id
 * @property string $rate_mark Рейтинг
 * @property int $rate_mean Среднее значение по показателям
 * @property string $employee Сотрудник
 * @property int $employee_isn ИСН сотрудника
 * @property string|null $department Подразделение
 * @property int $department_isn ИСН подразделения
 * @property string|null $duty Должность
 * @property string|null $category Категория
 * @property int $category_isn ИСН категории
 * @property int $rentability Рентабельность, %
 * @property int $execution_plan Исполнение плана, %
 * @property int $cost_price Себестоимость, %
 * @property int $net_claim Убыточность, %
 * @property int $ar_current ДЗ текущая, %
 * @property int $priority_class Приоритетные классы (кол-во)
 * @property int $prolongation Пролонгация, %
 * @property int $new_clients Новые клиенты, %
 * @property int $direct_sales Доля прямых продаж, %
 * @property int $calc_share % перехода сделки в договор ч/з андеррайтинг
 * @property int $cross_share Кросс-продажи,%
 * @property int|null $doc_isn ИСН документа
 * @property string $rating_date Дата рейтинга
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereArCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereCalcShare($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereCategoryIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereCostPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereCrossShare($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereDepartmentIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereDirectSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereDocIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereDuty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereEmployee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereEmployeeIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereExecutionPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereNetClaim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereNewClients($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList wherePriorityClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereProlongation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereRateMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereRateMean($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereRatingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereRentability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingList whereUpdatedAt($value)
 */
	class RatingList extends \Eloquent {}
}

namespace App{
/**
 * App\RatingPermission
 *
 * @property int $id
 * @property int $user_isn
 * @property int $dept_isn
 * @property string $type
 * @property int $changer
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\RatingPermission onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission whereChanger($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission whereDeptIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RatingPermission whereUserIsn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RatingPermission withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\RatingPermission withoutTrashed()
 */
	class RatingPermission extends \Eloquent {}
}

namespace App{
/**
 * App\Region
 *
 * @property int $id
 * @property int $isn
 * @property string $name
 * @property int $parentisn
 * @property string|null $parentname
 * @property string|null $regionisn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereParentisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereParentname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereRegionisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent {}
}

namespace App{
/**
 * App\Relog
 *
 * @property int $id
 * @property string $doc_no
 * @property string $status
 * @property int $in_process
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relog whereDocNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relog whereInProcess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relog whereUpdatedAt($value)
 */
	class Relog extends \Eloquent {}
}

namespace App{
/**
 * App\RelogUrl
 *
 * @property int $id
 * @property string $url
 * @property int $doc_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelogUrl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelogUrl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelogUrl query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelogUrl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelogUrl whereDocId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelogUrl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelogUrl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelogUrl whereUrl($value)
 */
	class RelogUrl extends \Eloquent {}
}

namespace App{
/**
 * App\StoreItem
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StoreItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StoreItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StoreItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StoreItem whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StoreItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StoreItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StoreItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StoreItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StoreItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StoreItem whereUpdatedBy($value)
 */
	class StoreItem extends \Eloquent {}
}

namespace App{
/**
 * App\SvgFiles
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SvgFiles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SvgFiles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SvgFiles query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SvgFiles whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SvgFiles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SvgFiles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SvgFiles whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SvgFiles whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SvgFiles whereUrl($value)
 */
	class SvgFiles extends \Eloquent {}
}

namespace App{
/**
 * Class UploadDocs
 *
 * @package App
 * @property $id int
 * @property $title string
 * @property $encoded_text string
 * @property $only_text string
 * @property $url string
 * @property $user_isn int
 * @property $file_url string
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs whereEncodedText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs whereFileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs whereOnlyText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UploadDocs whereUserIsn($value)
 */
	class UploadDocs extends \Eloquent {}
}

namespace App{
/**
 * Class User
 *
 * @package App
 * @property integer $ISN
 * @property string $username
 * @property string $password_hash
 * @property integer $level
 * @property string $short_name
 * @property string $full_name
 * @property string $session_id
 * @property integer $dept_isn
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Branch $branch
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeptIsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereISN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePasswordHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\UserAnswer
 *
 * @property int $id
 * @property int $question_id
 * @property int $answer_id
 * @property int $user_isn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAnswer whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAnswer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAnswer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAnswer whereUserIsn($value)
 */
	class UserAnswer extends \Eloquent {}
}

namespace App{
/**
 * App\UserToken
 *
 * @property int $id
 * @property int $ISN
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserToken whereISN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserToken whereUpdatedAt($value)
 */
	class UserToken extends \Eloquent {}
}

