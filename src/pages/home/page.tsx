import React from 'react';
import './style.scss';

const Home: React.FC = () => {
  return (
    <div className="home">
      <div className="o-nas box">
        <h1>O nás</h1>
        <p>
          Vítáme vás na stránkách naší chovatelské stanice. Jsme chovatelská
          stanice sídlící ve Zbožíčku poblíž Benátek nad Jizerou. Všechny naše
          kočky a kocouři žijí v dokonalém souladu se psy. Mají možnost trávit
          volný čas venku i v domě díky zabezpečenému venkovnímu výběhu. Kdykoli
          chtějí, honí se v trávě, lezou po stromech nebo se vyhřívají na
          sluníčku. Po celý den mají k dospozici kvalitními superprémiové
          granulky Royal Canin a rádi si pochutnají i na jiných kočičích
          pochoutkách, kapsičkách, šunce, syrovém hovězím mase.
        </p>
      </div>
      <div className="pro-zajemce box">
        <h1>Pro zájemce o adopci</h1>
        <p>
          Naše koťátka odcházejí do nových domovů vychovaná v okruhu nás a
          našich kočičích a psích kamarádů, naučená čistotě. Koťátka jsou
          několikrát odčervená a plně očkovaná, s průkazem původu, očkovacím
          průkazem a kupní smlouvou. Rodiče mají negativní testy na FeLV a FIV.
        </p>
      </div>
      <div className="map box">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2362.9162038573145!2d14.933648376120932!3d50.22939760325603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470c07cf4895ba81%3A0xbacc3b56ffb7f22c!2sGarfields%20Baby%20-%20Maine%20Coon%20Cattery!5e1!3m2!1scs!2scz!4v1738080338179!5m2!1scs!2scz"
          style={{ border: 0, width: '100%', height: '500px' }}
          allowFullScreen
          loading="lazy"
          referrerPolicy="no-referrer-when-downgrade"
        />
      </div>
    </div>
  );
};

export default Home;
