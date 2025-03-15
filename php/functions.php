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
            $_SESSION['role'] = $user_data['role']; // Uložení role do session
            return $user_data;
        }
    }
    die;
}

function login($conn, $username, $password)
{
    $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['role'] = $user_data['role']; // Set the role in the session

            header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
            die;
        }
    }
    echo "<script>alert('Neplatné uživatelské jméno nebo heslo');</script>";
    echo "<script>window.location.href = '" . htmlspecialchars($_SERVER['PHP_SELF']) . "';</script>";
    return;
}

function signup($conn, $username, $password)
{
    $query = "select * from users where username = '$username' limit 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<script>alert('Uživatelské jméno je již zabráno');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
        return;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "insert into users (username, password) values ('$username', '$hashed_password')";
    if (mysqli_query($conn, $query)) {
        // Fetch the newly created user data
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            // Log in the user
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['role'] = $user_data['role']; // Set the role in the session

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
            // Add more translations as needed
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
            // Add more translations as needed
        ]
    ];

    $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'cz';
    return $translations[$lang][$text] ?? $text;
}

function set_language($lang)
{
    $_SESSION['lang'] = $lang;
}
