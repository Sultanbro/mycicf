<?php

namespace App\Console\Commands;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class KiasImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kias:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить фотографии всех сотрудников';

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
    public function handle(KiasServiceInterface $kias)
    {
        $start = time();
        echo "Started at : {$start}\n";
        echo "Initialyzing KIAS\n";
        $kias->initSystem();
        echo "Kias initialized\nGetting all images\n";
        $images = $kias->getEmplImagesByDate('01.01.1970');
        if ($images->error) {
            echo "Error : " . (string)$images->error . "\n";
        } else {
            $size = sizeof($images->images->row);
            echo "Founded {$size} new images\n";
            foreach ($images->images->row as $image) {
                $SubjISN = (string)$image->SubjISN;
                $result = $kias->getAttachmentData((string)$image->RefISN, (string)$image->ISN, 'J');
                if($result->error){
                    echo "Error : ".(string)$result->error;
                    $diff = time() - $start;
                    echo "\nFinished at : $diff";
                }
                $imageData = base64_decode((string)$result->FILEDATA);
                Storage::disk('local')->put("public/images/employee/$SubjISN.png", $imageData);
            }
        }
        $diff = time() - $start;
        echo "Finished at {$diff} sec";
    }
}