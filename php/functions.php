<?php
function check_login($conn)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            $_SESSION['role'] = $user_data['role'];
            return $user_data;
        }
    }
    die;
}

function logout()
{
    $lang = $_SESSION['lang'] ?? 'cz';
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['lang'] = $lang;
}

function login($conn, $username, $password)
{
    if (!preg_match('/^[a-zA-Z0-9._]+$/', $username)) {
        echo "<script>alert('" . htmlspecialchars('Uživatelské jméno může obsahovat pouze písmena, číslice, tečky a podtržítka.') . "');</script>";
        echo "<script>window.location.href = '" . htmlspecialchars($_SERVER['PHP_SELF']) . "';</script>";
        return;
    }

    $username = htmlspecialchars($username);
    $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = htmlspecialchars($user_data['username']);
            $_SESSION['role'] = htmlspecialchars($user_data['role']);

            header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
            die;
        }
    }
    echo "<script>alert('" . htmlspecialchars('Neplatné uživatelské jméno nebo heslo') . "');</script>";
    echo "<script>window.location.href = '" . htmlspecialchars($_SERVER['PHP_SELF']) . "';</script>";
    return;
}

function signup($conn, $username, $password)
{
    if (strlen($username) < 3) {
        echo "<script>alert('" . htmlspecialchars('Username must be at least 3 characters long.') . "');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
        return;
    }

    if (strlen($password) < 6) {
        echo "<script>alert('" . htmlspecialchars('Password must be at least 6 characters long.') . "');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
        return;
    }

    if (!preg_match('/^[a-zA-Z0-9._]+$/', $username)) {
        echo "<script>alert('" . htmlspecialchars('Uživatelské jméno může obsahovat pouze písmena, číslice, tečky a podtržítka.') . "');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
        return;
    }

    $username = htmlspecialchars($username);
    $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        echo "<script>alert('" . htmlspecialchars('Uživatelské jméno je již zabráno') . "');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
        return;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $hashed_password);
    if ($stmt->execute()) {
        $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = htmlspecialchars($user_data['username']);
            $_SESSION['role'] = htmlspecialchars($user_data['role']);

            echo "<script>window.location.href = '" . htmlspecialchars($_SERVER['PHP_SELF']) . "';</script>";
            return;
        }
    }
    return "Signup failed";
}

function translate($text)
{
    $translations = [
        'cz' => [
            'welcome' => 'Vítáme vás na stránkách naší chovatelské stanice.',
            'login' => 'PŘIHLÁSIT SE',
            'signup' => 'ZAREGISTROVAT SE',
            'username' => 'Zadej uživatelské jméno',
            'password' => 'Zadej heslo',
            'loginBtn' => 'Přihlásit se',
            'signupBtn' => 'Zaregistrovat se',
            'not_registered' => 'Ještě nejsi zaregistrovaný?',
            'already_registered' => 'Už máš účet?',
            'view_castrates' => 'Prohlédněte si naše kastráty',
            'view_cats' => 'Prohlédněte si naše kočky',
            'view_toms' => 'Prohlédněte si naše kocoury',
            'main_image' => 'Hlavní obrázek',
            'for_interested' => 'Pro zájemce',
            'logged_in' => 'Jste přihlášen, ',
            'logout' => 'Odhlásit se',
            'profile' => 'Profil',
            'cats' => 'Kočky',
            'kittens' => 'Koťata',
            'toms' => 'Kocouři',
            'castrates' => 'Kastráti',
            'plan' => 'Plán',
            'contact' => 'Kontakt',
            'offspring' => 'Odchovy',
            'news' => 'Novinky',
            'description-text' => 'Jsme chovatelská stanice sídlící ve Zbožíčku poblíž Benátek nad Jizerou. Všechny naše kočky a kocouři žijí v dokonalém souladu se psy. Mají možnost trávit volný čas venku i v domě díky zabezpečenému venkovnímu výběhu. Kdykoli chtějí, honí se v trávě, lezou po stromech nebo se vyhřívají na sluníčku. Po celý den mají k dospozici kvalitními superprémiové granulky Royal Canin a rádi si pochutnají i na jiných kočičích pochoutkách, kapsičkách, šunce, syrovém hovězím mase.',
            'info_title' => 'Informace pro zájemce',
            'info_description' => 'Zde najdete všechny potřebné informace, které potřebujete vědět, když si kupujete kočku z naší chovatelské stanice.',
            'info_subtitle1' => 'Podmínky prodeje',
            'info_text1' => 'Naše kočky jsou prodávány pouze do dobrých rukou. Každý zájemce musí projít schválením.',
            'info_subtitle2' => 'Zdravotní péče',
            'info_text2' => 'Všechny naše kočky jsou pravidelně očkovány a kontrolovány veterinářem.',
            'info_subtitle3' => 'Kontakt',
            'info_text3' => 'Pro více informací nás můžete kontaktovat na emailu nebo telefonicky.',
            'why_adopt' => 'Proč adoptovat kočku od nás?',
            'why_adopt_text' => 'Naše chovatelská stanice se specializuje na odchov zdravých, společenských a přítulných koček. Každá z našich koček vyrůstá v láskyplném prostředí, je pravidelně veterinárně kontrolována a pečlivě socializována.',
            'adoption_conditions' => 'Podmínky adopce',
            'adoption_conditions_text' => 'Než se rozhodnete pro adopci, měli byste splňovat několik základních podmínek:',
            'condition1' => 'Stabilní domov, kde bude kočka v bezpečí a pohodlí.',
            'condition2' => 'Zajištěné finanční prostředky na krmení, veterinární péči a další potřeby.',
            'condition3' => 'Dostatek času a trpělivosti na socializaci a věnování se kočce.',
            'adoption_process' => 'Jak adopce probíhá?',
            'process_step1' => 'Vyplnění adopčního formuláře – Pomůže nám zjistit, zda je kočka pro vás vhodná.',
            'process_step2' => 'Osobní schůzka – Pozveme vás do naší stanice, abyste se s kočkou seznámili.',
            'process_step3' => 'Schválení adopce – Pokud vše proběhne v pořádku, dohodneme se na termínu předání.',
            'process_step4' => 'Podpis adopční smlouvy – Dokument zajišťuje, že o kočku bude řádně postáráno.',
            'process_step5' => 'Předání kočky – Dostanete i informace o její výživě, zvyklostech a potřebách.',
            'what_you_get' => 'Co dostanete s kočkou?',
            'what_you_get_text' => 'Každá kočka od nás odchází:',
            'get_item1' => 'Plně očkovaná a odčervená.',
            'get_item2' => 'S průkazem původu.',
            'get_item3' => 'S veterinárním potvrzením o zdravotním stavu.',
            'get_item4' => 'S malým startovacím balíčkem (krmivo, hračka apod.).',
            'contact_name' => 'Jméno:',
            'contact_address' => 'Adresa:',
            'contact_phone' => 'Telefon:',
            'contact_info' => 'Máte-li jakékoli dotazy nebo potřebujete více informací, neváhejte nás kontaktovat. Rádi vám pomůžeme.',
            'contact_form' => 'Kontaktní formulář',
            'contact_message' => 'Zpráva',
            'contact_submit' => 'Odeslat',
            'contact_notLogged_message' => 'Pro zobrazení kontaktního formuláře se musíte přihlásit.',
            'profile_edit' => 'Úprava profilu',
            'new_password_optional' => 'Nové heslo (nepovinné)',
            'confirm_password' => 'Potvrzení hesla',
            'save_changes' => 'Uložit změny',
            'error_username_same' => 'Nové uživatelské jméno musí být odlišné od aktuálního.',
            'error_username_short' => 'Uživatelské jméno musí mít alespoň 3 znaky.',
            'error_password_short' => 'Heslo musí mít alespoň 6 znaků.',
            'error_password_mismatch' => 'Hesla se neshodují.',
            'profile_update_success' => 'Profil byl úspěšně aktualizován.',
            'profile_update_error' => 'Chyba při aktualizaci profilu.',
            'kitten_search_title' => 'Vyhledávání Koťat',
            'kitten_search_heading' => 'Vyhledávání koťat',
            'ems_code' => 'EMS kód',
            'enter_ems_code' => 'Zadejte EMS kód',
            'color_code_info' => 'KÓDY ZBARVENÍ SRSTI A EXTERIÉROVÝCH ZNAKŮ',
            'search_button' => 'Vyhledat',
            'reset_button' => 'Reset',
            'color_codes_title' => 'KÓDY ZBARVENÍ SRSTI',
            'color_codes_description' => 'Pro zjednodušení v tabulce uvádíme jen ty barvy, které se v naší chovné stanici vyskytují',
            'color_black' => 'černá',
            'color_black_silver' => 'černá stříbřitá',
            'color_blue' => 'modrá',
            'color_blue_silver' => 'modrá stříbřitá',
            'color_red' => 'červená',
            'color_red_silver' => 'červená stříbřitá',
            'color_cream' => 'krémová',
            'color_cream_silver' => 'krémová stříbřitá',
            'color_tortie' => '(černě) želvovinová',
            'color_tortie_silver' => 'černě želvovinová stříbřitá',
            'color_blue_tortie' => 'modře želvovinová (modrokrémová)',
            'color_blue_tortie_silver' => 'modře želvovinová stříbřitá',
            'color_code_silver_explanation' => 'Malé písmeno "s" tvoří doplňkový kód označující typ depigmentace srsti (tiping) - stříbřitá',
            'exterior_codes_title' => 'KÓDY EXTERIÉROVÝCH ZNAKŮ',
            'exterior_bicolor' => 'bíle skvrnitá typu "bikolor"',
            'exterior_marble' => 'mramorovaná (blotched)',
            'exterior_white_spots' => 's nespecifikovanými bílými skvrnami',
            'exterior_tabby' => 'tygrovaná (mackerel)',
            'exterior_spotted' => 'tečkovaná (spotted)',
            'examples_title' => 'Příklady zadání:',
            'example_1' => 'Příklad 1',
            'example_1_description' => 'vyhledá všechna koťátka s barvou červená (d) mramorovaná (22)',
            'example_2' => 'Příklad 2',
            'example_2_description' => 'vyhledá všechna koťátka s barvou červená (d) stříbřitá (s) mramorovaná (22) s bílou (09)',
            'example_3' => 'Příklad 3',
            'example_3_description' => 'vyhledá všechny barvy mramorovaných koťátek s bílou (0922)',
            'kittens_with_ems_code' => 'Koťata s EMS kódem',
            'color' => 'Barva',
            'status' => 'Status',
            'litter' => 'Vrh',
            'batch_number' => 'Řada',
            'available_kittens' => 'Volná koťata',
            'pedigree' => 'Rodokmen',
            'mother' => 'Matka',
            'father' => 'Otec',
            'exhibitions' => 'Výstavy',
            'no_images_found' => 'Pro toto kotě nebyly nalezeny žádné obrázky.',
            'no_cats_found' => 'Pro tento vrh nebyly nalezeny žádné kočky.',
            'litter_not_found' => 'Vrh nebyl nalezen.',
            'litter_id_not_specified' => 'ID vrhu nebylo specifikováno.',
            'no_images_found' => 'No images found for this kitten.',
            'no_cats_found' => 'No cats found for this litter.',
            'litter_not_found' => 'Litter not found.',
            'litter_id_not_specified' => 'Litter ID was not specified.',
            'back_to_odchovy' => 'Zpět na odchovy',
            'row_of_litters' => 'řada vrhů',
            'no_kittens_found' => 'Nebyly nalezeny žádná koťata s EMS kódem',
        ],
        'en' => [
            'welcome' => 'Welcome to our cattery website.',
            'login' => 'LOGIN',
            'signup' => 'SIGN UP',
            'username' => 'Enter username',
            'password' => 'Enter password',
            'loginBtn' => 'Login',
            'signupBtn' => 'Sign Up',
            'not_registered' => 'Not registered yet?',
            'already_registered' => 'Already have an account?',
            'view_castrates' => 'View our castrates',
            'view_cats' => 'View our cats',
            'view_toms' => 'View our toms',
            'main_image' => 'Main image',
            'for_interested' => 'For interested',
            'logged_in' => 'You are logged in, ',
            'logout' => 'Logout',
            'profile' => 'Profile',
            'cats' => 'Cats',
            'kittens' => 'Kittens',
            'toms' => 'Toms',
            'castrates' => 'Castrates',
            'plan' => 'Plan',
            'contact' => 'Contact',
            'offspring' => 'Offspring',
            'news' => 'News',
            'description-text' => 'We are a kennel located in Zbožíček near Venice nad Jizerou. All our cats and tomcats live in perfect harmony with dogs. They have the opportunity to spend their free time outdoors and in the house thanks to a secure outdoor enclosure. Whenever they want, they chase in the grass, climb trees or bask in the sun. They have a good quality Royal Canin super premium kibble available all day long and enjoy other cat treats, pocket pellets, ham, raw beef.',
            'why_adopt' => 'Why adopt a cat from us?',
            'why_adopt_text' => 'Our cattery specializes in breeding healthy, social, and affectionate cats. Each of our cats grows up in a loving environment, is regularly checked by a veterinarian, and carefully socialized.',
            'adoption_conditions' => 'Adoption Conditions',
            'adoption_conditions_text' => 'Before deciding to adopt, you should meet a few basic conditions:',
            'condition1' => 'A stable home where the cat will be safe and comfortable.',
            'condition2' => 'Secured financial resources for food, veterinary care, and other needs.',
            'condition3' => 'Enough time and patience for socialization and attention to the cat.',
            'adoption_process' => 'How does the adoption process work?',
            'process_step1' => 'Filling out the adoption form – It helps us determine if the cat is suitable for you.',
            'process_step2' => 'Personal meeting – We invite you to our cattery to meet the cat.',
            'process_step3' => 'Adoption approval – If everything goes well, we agree on the handover date.',
            'process_step4' => 'Signing the adoption contract – The document ensures that the cat will be properly cared for.',
            'process_step5' => 'Handover of the cat – You will also receive information about its diet, habits, and needs.',
            'what_you_get' => 'What do you get with the cat?',
            'what_you_get_text' => 'Each cat from us leaves:',
            'get_item1' => 'Fully vaccinated and dewormed.',
            'get_item2' => 'With a pedigree (if it is a pedigree cat).',
            'get_item3' => 'With a veterinary certificate of health.',
            'get_item4' => 'With a small starter pack (food, toy, etc.).',
            'contact_name' => 'Name:',
            'contact_address' => 'Address:',
            'contact_phone' => 'Phone:',
            'contact_info' => 'If you have any questions or need more information, please do not hesitate to contact us. We are happy to help.',
            'contact_form' => 'Contact Form',
            'contact_message' => 'Message',
            'contact_submit' => 'Submit',
            'contact_notLogged_message' => 'To display the contact form, you must be logged in.',
            'profile_edit' => 'Edit Profile',
            'new_password_optional' => 'New Password (optional)',
            'confirm_password' => 'Confirm Password',
            'save_changes' => 'Save Changes',
            'error_username_same' => 'The new username must be different from the current one.',
            'error_username_short' => 'The username must be at least 3 characters long.',
            'error_password_short' => 'The password must be at least 6 characters long.',
            'error_password_mismatch' => 'The passwords do not match.',
            'profile_update_success' => 'Profile updated successfully.',
            'profile_update_error' => 'Error updating profile.',
            'kitten_search_title' => 'Kitten Search',
            'kitten_search_heading' => 'Kitten Search',
            'ems_code' => 'EMS Code',
            'enter_ems_code' => 'Enter EMS Code',
            'color_code_info' => 'COAT COLOR AND EXTERIOR FEATURE CODES',
            'search_button' => 'Search',
            'reset_button' => 'Reset',
            'color_codes_title' => 'COAT COLOR CODES',
            'color_codes_description' => 'For simplicity, the table only lists the colors that occur in our cattery',
            'color_black' => 'black',
            'color_black_silver' => 'black silver',
            'color_blue' => 'blue',
            'color_blue_silver' => 'blue silver',
            'color_red' => 'red',
            'color_red_silver' => 'red silver',
            'color_cream' => 'cream',
            'color_cream_silver' => 'cream silver',
            'color_tortie' => 'tortoiseshell',
            'color_tortie_silver' => 'tortoiseshell silver',
            'color_blue_tortie' => 'blue tortoiseshell',
            'color_blue_tortie_silver' => 'blue tortoiseshell silver',
            'color_code_silver_explanation' => 'The lowercase "s" forms a supplementary code indicating the type of coat depigmentation (tipping) - silver',
            'exterior_codes_title' => 'EXTERIOR FEATURE CODES',
            'exterior_bicolor' => 'white spotted "bicolor" type',
            'exterior_marble' => 'marble (blotched)',
            'exterior_white_spots' => 'with unspecified white spots',
            'exterior_tabby' => 'tabby (mackerel)',
            'exterior_spotted' => 'spotted',
            'examples_title' => 'Examples:',
            'example_1' => 'Example 1',
            'example_1_description' => 'will search for all kittens with red (d) marble (22) color',
            'example_2' => 'Example 2',
            'example_2_description' => 'will search for all kittens with red (d) silver (s) marble (22) with white (09)',
            'example_3' => 'Example 3',
            'example_3_description' => 'will search for all colors of marble kittens with white (0922)',
            'kittens_with_ems_code' => 'Kittens with EMS Code',
            'color' => 'Color',
            'status' => 'Status',
            'litter' => 'Litter',
            'batch_number' => 'Batch Number',
            'available_kittens' => 'Available Kittens',
            'pedigree' => 'Pedigree',
            'mother' => 'Mother',
            'father' => 'Father',
            'exhibitions' => 'Exhibitions',
            'back_to_odchovy' => 'Back to Offspring',
            'row_of_litters' => 'batch of litters',
            'no_images_found' => 'No images found for this kitten.',
            'no_kittens_found' => 'No kittens found with EMS code',
        ]
    ];

    $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'cz';
    return $translations[$lang][$text] ?? $text;
}

function set_language($lang)
{
    $_SESSION['lang'] = $lang;
}
