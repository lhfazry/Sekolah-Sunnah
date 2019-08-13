<?php

namespace App\Helpers;

class AttachmentHelper
{
    public static function wrapAttachments($object) {
        if(!empty($object->attachment1)) {
            $object->attachment1 = asset('storage/'.$object->attachment1);
        }

        if(!empty($object->attachment2)) {
            $object->attachment2 = asset('storage/'.$object->attachment2);
        }

        if(!empty($object->attachment3)) {
            $object->attachment3 = asset('storage/'.$object->attachment3);
        }
    }

    public static function saveAttachments($request, $model) {
        if($request->hasFile('attachment1')) {
            $attachment1 = AttachmentHelper::store($request->file('attachment1'));
            $model->attachment1 = $attachment1;
        }

        if($request->hasFile('attachment2')) {
            $attachment2 = AttachmentHelper::store($request->file('attachment2'));
            $model->attachment2 = $attachment2;
        }

        if($request->hasFile('attachment3')) {
            $attachment3 = AttachmentHelper::store($request->file('attachment3'));
            $model->attachment3 = $attachment3;
        }

        $model->save();
    }

    private static function store($requestFile) {
        $name = $requestFile->getClientOriginalName();
        $name = \preg_replace("/[^a-z0-9\_\-\.]/i", '_', $name);
        $name = \time()."_".$name;
        return $requestFile->storeAs('attachments', $name, 'public');
    }

    public static function getAttachmentsRules() {
        $rules =  "nullable|mimes:xls,xlt,xla,xlsx,xltx,xlsm,xltm,xlam,xlsb,doc,dot,docx,dotx,docm,dotm,".
            "ppt,pot,pps,ppa,pptx,potx,ppsx,ppam,pptm,potm,ppsm,ppsm,".
            "jpeg,png,pdf|max:5000";

        $rules =  "nullable|max:5000";

        return [
            'attachment1' => $rules,
            'attachment2' => $rules,
            'attachment3' => $rules
        ];
    }
}
