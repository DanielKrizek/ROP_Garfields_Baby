<?php
function translate($key, $lang = 'en')
{
    $translations = [
        'en' => [
            'profile_edit' => 'Edit Profile',
            'username' => 'Username',
            'new_password_optional' => 'New Password (optional)',
            'confirm_password' => 'Confirm Password',
            'save_changes' => 'Save Changes',
            'error_username_same' => 'The new username cannot be the same as the current one.',
            'error_username_short' => 'The username must be at least 3 characters long.',
            'error_password_short' => 'The password must be at least 6 characters long.',
            'error_password_mismatch' => 'The passwords do not match.',
            'profile_update_success' => 'Profile updated successfully.',
            'profile_update_error' => 'An error occurred while updating the profile.',
        ],
        'cs' => [
            'profile_edit' => 'Upravit profil',
            'username' => 'Uživatelské jméno',
            'new_password_optional' => 'Nové heslo (volitelné)',
            'confirm_password' => 'Potvrdit heslo',
            'save_changes' => 'Uložit změny',
            'error_username_same' => 'Nové uživatelské jméno nemůže být stejné jako aktuální.',
            'error_username_short' => 'Uživatelské jméno musí mít alespoň 3 znaky.',
            'error_password_short' => 'Heslo musí mít alespoň 6 znaků.',
            'error_password_mismatch' => 'Hesla se neshodují.',
            'profile_update_success' => 'Profil byl úspěšně aktualizován.',
            'profile_update_error' => 'Při aktualizaci profilu došlo k chybě.',
        ],
    ];

    return $translations[$lang][$key] ?? $key;
}
