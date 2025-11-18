<?php

namespace App\Filament\Admin\Resources\UserResource\Pages;

use App\Filament\Admin\Resources\UserResource;
 
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RegistrationMail;
use App\Models\FormSubmission;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    
    protected function afterCreate(): void
    {
        $user = $this->record;
        $formType = $this->data['form_type'] ?? 'adult-intake';
        $password = Str::random(8);


         
        // update password
        $user->update(['password' => Hash::make($password)]);

        // create form submission draft
        $submission = FormSubmission::create([
            'user_id' => $user->id,
            'form_type' => $formType,
            'form_name' => ucfirst(str_replace('-', ' ', $formType)),
            'status' => 'draft',
            'resume_token' => Str::uuid(),
        ]); 
        info('Created form submission draft for user ID ' . $user->id . ' with submission ID ' . $submission->id. ' and token ' . $submission->resume_token);

        // generate form link
        // $link = route('form.example') . '?token=' . $submission->resume_token;
        // $link = route('form.step', [
        //     'formType' => $formType,
        //     'step' => 1,
        // ]) . '?token=' . $submission->resume_token;

        $link = route('form.start', ['formType'=>'adult-intake','token'=>$submission->resume_token]);

        // send registration email
        Mail::to($user->email)->send(new RegistrationMail($user, $link, $password));
    }

    
}
