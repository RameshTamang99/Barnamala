<?php
namespace App\Repository;

class FileUploadRepository {

    public function handleFileUpload($path,$file)
    {
        try {

            if ($file) {

                $random = rand(0, 9999);
                $extension = $file->getClientOriginalExtension();
                $fileName = $random .time().'.'.$extension;
                $file->move('public/uploads/'.$path.'/',$fileName);
                return $fileName;
            }
            }catch(\Exception $e){

                return NULL;

            }

        return NULL;
    }
}

?>
