<?php

namespace App\Console\Commands;

use App\Library\Services\KiasServiceInterface;
use App\Relog;
use App\RelogUrl;
use Illuminate\Console\Command;

class SendRelogImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'relog:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send relog images to kias';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(KiasServiceInterface $kias) {
        $kias->initSystem();
        try {

            $image_info_collection = Relog::where('status', Relog::STATUS_PENDING)
                ->where('in_process', 0);

            $image_info_collection->update(['in_process' => 1]);

            $images_info = [];

            foreach ($image_info_collection->get() as $image) {
                array_push($images_info, [
                    'id' => $image->id,
                    'doc_no' => $image->doc_no
                ]);
            }
            foreach ($images_info as $key => $images) {
                $result = RelogUrl::where('doc_id', $images['id'])->get();
                foreach ($result as $res) {
                    $size = getimagesize(($res->url));
                    $extension = image_type_to_extension($size[2]);
                    $images_info[$key] = array_merge($images, [
                        'name' => time() . $extension,
                        'img' => base64_encode(file_get_contents($res->url)),
                    ]);
                }
            }

            foreach ($images_info as $image) {
                $result = $kias->request("SAVEATTACHMENT", [
                    "REFISN" => $image['doc_no'],
                    "PICTTYPE" => "D",
                    "FILENAME" => $image['name'],
                    "FILEREMARK" => "",
                    "OLEOBJECT" => $image['img']
                ]);
                if(!isset($result->error)) {
                    Relog::where("id", $image["id"])->update([
                        "status" => Relog::STATUS_ACCEPTED,
                    ]);
                }
                else {
                    Relog::where('id', $image['id'])->update([
                        'status' => Relog::STATUS_FAILED,
                    ]);
                }
            }
        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }
}
