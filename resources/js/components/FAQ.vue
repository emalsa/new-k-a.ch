<template>
  <!-- FAQ -->
  <section id="fragen-und-antworten" class="sm:py-16 py-12 bg-gradient-gray2 overflow-hidden">
    <div id="faq" class="container px-4 mx-auto">
      <div class="max-w-md mx-auto mb-20">
        <h2 class="mb-7 font-heading font-semibold text-center text-4xl text-gray-900">Fragen?</h2>
        <p class="text-lg text-gray-600 text-center">Hier unten die wichtigsten Fragen und Antworten über den
          Kirchenaustritt. Klicke einfach auf die Frage um deine Antwort zu erhalten.</p>
      </div>
      <div class="max-w-4xl mx-auto mb-24">
        <ul class="space-y-4">
          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(1)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <h3 class="font-heading text-lg font-medium text-gray-400">Wie kann ich aus der Kirche austreten?</h3>
              <svg class="closed flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.750214 10C0.750214 15.108 4.89121 19.25 10.0002 19.25C15.1082 19.25 19.2502 15.108 19.2502 10C19.2502 4.892 15.1082 0.75 10.0002 0.75C4.89121 0.75 0.750214 4.892 0.750214 10Z"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M6.52902 8.55774L10 12.0437L13.471 8.55774"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
              <svg class="opened hidden flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M19.2498 10C19.2498 4.892 15.1088 0.75 9.99979 0.75C4.89179 0.75 0.749786 4.892 0.749786 10C0.749786 15.108 4.89179 19.25 9.99979 19.25C15.1088 19.25 19.2498 15.108 19.2498 10Z"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M13.471 11.4423L9.99998 7.95626L6.52898 11.4423"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
            </button>
            <div class="panel" v-if="isActive[1] === 1">
              <p class="max-w-3xl mt-4 text-base  text-gray-800">
                Für den Austritt aus der Kirche in der Schweiz muss die betreffende Person, welche aus der Kirche
                austreten will, per Post einen Brief an die zuständige Kirchgemeinde senden.
              </p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">
                Es gibt kein Online Portal, Formular oder ähnliches welche von der Kirche zur Verfügung gestellt wird
                um
                deinen Kirchenaustritt zu erledigen. Du kannst dein Austrittsschreiben selber erfassen oder wir nehmen
                dir die Arbeit ab.
              </p>
            </div>
          </li>

          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(2)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <h3 class="font-heading text-lg font-medium text-gray-400">Wohin muss ich mein Austrittsschreiben
                schicken?</h3>
              <svg class="closed flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.750214 10C0.750214 15.108 4.89121 19.25 10.0002 19.25C15.1082 19.25 19.2502 15.108 19.2502 10C19.2502 4.892 15.1082 0.75 10.0002 0.75C4.89121 0.75 0.750214 4.892 0.750214 10Z"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M6.52902 8.55774L10 12.0437L13.471 8.55774"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
              <svg class="opened hidden flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M19.2498 10C19.2498 4.892 15.1088 0.75 9.99979 0.75C4.89179 0.75 0.749786 4.892 0.749786 10C0.749786 15.108 4.89179 19.25 9.99979 19.25C15.1088 19.25 19.2498 15.108 19.2498 10Z"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M13.471 11.4423L9.99998 7.95626L6.52898 11.4423"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
            </button>
            <div class="panel" v-if="isActive[2] === 2">
              <p class="max-w-3xl mt-4 text-base  text-gray-800">
                Jede Gemeinde respektive Stadt ist einer bestimmten Kirchgemeinde zugeteilt, diese ist jedoch nicht
                immer das Pfarramt oder die Adresse der Kirche in der Gemeinde. In den meisten Fällen scheitert der
                Kirchenaustritt an diesem Punkt. Das Austrittsschreiben wird an die falsche Kirchgemeinde geschickt.
              </p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">
                Die korrekte&nbsp;<a href="#angebot"
                                     class="underline underline-offset-4 decoration-green-600 hover:decoration-green-400 decoration-[3px]">
                Adresse der Kirchgemeinde</a> können wir dir geben.
              </p>

            </div>
          </li>

          <li id="garantie" class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(3)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <h3 class="font-heading text-lg font-medium text-gray-400">Was heisst <i>Garantierter Austritt</i>&nbsp;?
              </h3>
              <svg class="closed flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.750214 10C0.750214 15.108 4.89121 19.25 10.0002 19.25C15.1082 19.25 19.2502 15.108 19.2502 10C19.2502 4.892 15.1082 0.75 10.0002 0.75C4.89121 0.75 0.750214 4.892 0.750214 10Z"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M6.52902 8.55774L10 12.0437L13.471 8.55774"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
              <svg class="opened hidden flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M19.2498 10C19.2498 4.892 15.1088 0.75 9.99979 0.75C4.89179 0.75 0.749786 4.892 0.749786 10C0.749786 15.108 4.89179 19.25 9.99979 19.25C15.1088 19.25 19.2498 15.108 19.2498 10Z"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M13.471 11.4423L9.99998 7.95626L6.52898 11.4423"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
            </button>
            <div class="panel" v-if="isActive[3] === 3">
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Du musst nur die notwendigen Daten, also Name, Adresse
                und Geburtsdatum eingeben. Die Adresse der Kirchgemeinde haben wir und schicken dir sogar noch das
                Austrittsschreiben. Du musst dein Austrittsschreiben nur ausdrucken, dann unterschreiben und zum Schluss
                zur Post bringen. Es ist also keine Recherche der Kirchgemeinde notwendig und du musst kein Schreiben
                erstellen. Du sparst mit uns Zeit und Nerven.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Im Falle dass uns bei der Kirchgemeinde einen Fehler
                unterlaufen ist, erstatten wir dir natürlich das Geld zurück. Beispielsweise wenn wir trotz Kontrolle
                dir die falsche Kirchgemeinde im Austrittsschreiben gegeben haben. Zudem werden wir dir ein neues
                Austrittsschreiben mit der korrekten Kirchgemeinde nachschicken.</p>
            </div>
          </li>

          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(4)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <span class="font-heading text-lg font-medium text-gray-400">Was passiert nachdem ich das Austrittsschreiben an die Kirchgemeinde geschickt habe?</span>
              <svg class="closed flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.750214 10C0.750214 15.108 4.89121 19.25 10.0002 19.25C15.1082 19.25 19.2502 15.108 19.2502 10C19.2502 4.892 15.1082 0.75 10.0002 0.75C4.89121 0.75 0.750214 4.892 0.750214 10Z"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M6.52902 8.55774L10 12.0437L13.471 8.55774"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
              <svg class="opened hidden flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M19.2498 10C19.2498 4.892 15.1088 0.75 9.99979 0.75C4.89179 0.75 0.749786 4.892 0.749786 10C0.749786 15.108 4.89179 19.25 9.99979 19.25C15.1088 19.25 19.2498 15.108 19.2498 10Z"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M13.471 11.4423L9.99998 7.95626L6.52898 11.4423"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
            </button>
            <div class="panel" v-if="isActive[4] === 4">
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Du erhältst nach etwa 4-6 Wochen eine Bestätigung per
                Post von der Kirchgemeinde.
                Die Kirchgemeinde schickt ebenfalls eine Bestätigung an das Steueramt deiner Gemeinde, um dich von der
                Kirchensteuer zu befreien.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Als gute Praxis etabliert hat sich dass das Steueramt
                deiner Gemeinde von dir ebenfalls über deinen Kirchenaustritt informiert wird.
                Für den Fall das es die Kirchgemeinde nicht macht.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">
                Wir schicken dir ebenfalls das Schreiben für das Steueramt beim
                <a href="#angebot"
                   class="underline underline-offset-4 decoration-green-600 hover:decoration-green-400 decoration-[3px]">
                  <i>Garantierter Austritt.</i>
                </a><br/>Mit der korrekten Anschrift der Gemeinde.
              </p>
            </div>
          </li>

          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(5)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <span class="font-heading text-lg font-medium text-gray-400">Muss ich noch ein Gespräch führen wenn ich austreten will?</span>
              <svg class="closed flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.750214 10C0.750214 15.108 4.89121 19.25 10.0002 19.25C15.1082 19.25 19.2502 15.108 19.2502 10C19.2502 4.892 15.1082 0.75 10.0002 0.75C4.89121 0.75 0.750214 4.892 0.750214 10Z"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M6.52902 8.55774L10 12.0437L13.471 8.55774"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
              <svg class="opened hidden flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M19.2498 10C19.2498 4.892 15.1088 0.75 9.99979 0.75C4.89179 0.75 0.749786 4.892 0.749786 10C0.749786 15.108 4.89179 19.25 9.99979 19.25C15.1088 19.25 19.2498 15.108 19.2498 10Z"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M13.471 11.4423L9.99998 7.95626L6.52898 11.4423"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
            </button>
            <div class="panel" v-if="isActive[5] === 5">
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Grundsätzlich Nein.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Im Schreiben wird explizit erläutert dass keine
                Kontaktaufnahme gewünscht ist.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">In ganz wenigen Gemeinden ist der Austritt mit einem
                Gespräch verbunden. Die Anzahl dieser Gemeinden ist jedoch zu vernachlässigen. Das haben die
                entsprechenden Landeskirchen gesetzlich durchgesetzt.</p>
            </div>
          </li>

          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(6)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <span class="font-heading text-lg font-medium text-gray-400">Welche Probleme können auftreten?</span>
              <svg class="closed flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.750214 10C0.750214 15.108 4.89121 19.25 10.0002 19.25C15.1082 19.25 19.2502 15.108 19.2502 10C19.2502 4.892 15.1082 0.75 10.0002 0.75C4.89121 0.75 0.750214 4.892 0.750214 10Z"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M6.52902 8.55774L10 12.0437L13.471 8.55774"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
              <svg class="opened hidden flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M19.2498 10C19.2498 4.892 15.1088 0.75 9.99979 0.75C4.89179 0.75 0.749786 4.892 0.749786 10C0.749786 15.108 4.89179 19.25 9.99979 19.25C15.1088 19.25 19.2498 15.108 19.2498 10Z"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M13.471 11.4423L9.99998 7.95626L6.52898 11.4423"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
            </button>
            <div class="panel" v-if="isActive[6] === 6">
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Meistens läuft der Kirchenaustritt reibungslos. In
                einigen Fällen wird einem der Austritt erschwert mit Gründen die rechtlich nicht standhalten. Meistens
                gewähren die betreffenden Institutionen den Kirchenaustritt ohne grosse Bürokratie.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Das sind die häufigsten Gründe weshalb der Austritt
                erschwert wird.</p>
              <div class="max-w-3xl mt-4 text-base text-gray-800">
                <ul class="mb-3">
                  <li class="font-bold mb-2">Fehlendes Taufdatum oder Taufort</li>
                  <li>Ein fehlendes Taufdatum oder Taufort ist rechtlich keinen Grund um einen Austritt zu verweigern.
                    Das
                    wird dann als Begründung geliefert wenn ein Austritt aus der Pfarrei vorgenommen wird. Einfach
                    nochmals begründen das man nicht aus aus der Pfarrei austreten will sondern aus der Institution der
                    öffentlichen-rechtlichen Landeskirche. Dafür braucht es kein Taufdatum/Taufort.
                  </li>
                </ul>
                <ul class="mb-3">
                  <li class="font-bold mb-2">Es wird um Gründe für einen Austritt verlangt</li>
                  <li>Gründe für einen Austritt musst du nicht geben. Erkläre das du informiert bist über den
                    Kirchenaustritt.
                  </li>
                </ul>
                <ul class="mb-3">
                  <li class="font-bold mb-2">Es wird um ein Gespräch gebeten</li>
                  <li>Erkläre dass dein Entscheid bereits gefallen ist und kein Gespräch von deiner Seite gewünscht ist.
                  </li>
                </ul>
                <ul class="mb-3">
                  <li class="font-bold mb-2">Keine Bestätigung nach 4-6 Wochen</li>
                  <li>Schreibe einen eingeschriebenen Brief an die Kirchgemeinde und verlange eine Bestätigung von
                    deinem Kirchenaustritt innerhalb von einer Woche.
                  </li>
                </ul>
              </div>
            </div>
          </li>

          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(7)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <span class="font-heading text-lg font-medium text-gray-400">Für Kantone St. Gallen und beider Appenzell</span>
              <svg class="closed flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.750214 10C0.750214 15.108 4.89121 19.25 10.0002 19.25C15.1082 19.25 19.2502 15.108 19.2502 10C19.2502 4.892 15.1082 0.75 10.0002 0.75C4.89121 0.75 0.750214 4.892 0.750214 10Z"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M6.52902 8.55774L10 12.0437L13.471 8.55774"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
              <svg class="opened hidden flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M19.2498 10C19.2498 4.892 15.1088 0.75 9.99979 0.75C4.89179 0.75 0.749786 4.892 0.749786 10C0.749786 15.108 4.89179 19.25 9.99979 19.25C15.1088 19.25 19.2498 15.108 19.2498 10Z"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M13.471 11.4423L9.99998 7.95626L6.52898 11.4423"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
            </button>
            <div class="panel" v-if="isActive[7] === 7">
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Das Austrittsschreiben muss eine beglaubigte
                Unterschrift haben in diesen Kantonen.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Das heisst, nachdem das Dokument ausgedruckt
                ist, <b>noch nicht unterschreiben.</b> Gehe dann mit dem Austrittsschreiben und ID/Pass zu deiner
                Gemeinde/Stadtverwaltung und verlange eine beglaubigte Unterschrift für dein Austrittsschreiben.</p>
            </div>
          </li>

          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(8)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <span class="font-heading text-lg font-medium text-gray-400">Wie erhalte ich das Austrittsschreiben?</span>
              <svg class="closed flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.750214 10C0.750214 15.108 4.89121 19.25 10.0002 19.25C15.1082 19.25 19.2502 15.108 19.2502 10C19.2502 4.892 15.1082 0.75 10.0002 0.75C4.89121 0.75 0.750214 4.892 0.750214 10Z"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M6.52902 8.55774L10 12.0437L13.471 8.55774"
                      stroke="#838EA4"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
              <svg class="opened hidden flex-shrink-0"
                   width="20"
                   height="20"
                   viewbox="0 0 20 20"
                   fill="none"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M19.2498 10C19.2498 4.892 15.1088 0.75 9.99979 0.75C4.89179 0.75 0.749786 4.892 0.749786 10C0.749786 15.108 4.89179 19.25 9.99979 19.25C15.1088 19.25 19.2498 15.108 19.2498 10Z"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M13.471 11.4423L9.99998 7.95626L6.52898 11.4423"
                      stroke="#45C1FF"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
            </button>
            <div class="panel" v-if="isActive[8] === 8">
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Du bekommst das Austrittsschreiben per Email
                zugeschickt.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Kontaktiere uns über das Kontaktformular wenn du die
                Dokumente per Post erhalten möchtest.</p>
            </div>
          </li>

        </ul>
      </div>
      <a class="close-menu group block max-w-max mx-auto font-heading font-medium text-gray-900 hover:text-gray-800 text-base overflow-hidden"
         href="#contact">
        <!--        <p class="mb-1">Didn’t find the answer? Contact us here</p>-->
        <div class="w-full transform -translate-x-0 group-hover:translate-x-full h-px bg-gradient-cyan transition ease-in-out duration-500"></div>
      </a>
    </div>
  </section>


</template>
<script>
// console.log('DOMContentLoaded')
//
// let acc = document.getElementsByClassName('accordion');
// let index;
//
// console.log('acc: ' + acc.length)
//
// for (index = 0; index < acc.length; index++) {
//   console.log('for loop: ' + index)
//   acc[index].addEventListener('click', function () {
//     console.log('click toggle')
//     this.classList.toggle('active');
//     let svgOpened = this.querySelector('svg.opened');
//     let svgClosed = this.querySelector('svg.closed');
//     svgOpened.classList.toggle('hidden');
//     svgClosed.classList.toggle('hidden');
//     let panel = this.nextElementSibling;
//     if (panel.style.maxHeight) {
//       panel.style.maxHeight = null;
//     } else {
//       panel.style.maxHeight = panel.scrollHeight + 'px';
//     }
//   });
// }
export default {
  data() {
    return {
      transitionClass: '',
      isActive: []
    }
  },
  methods: {
    toggleItem(index) {
      this.isActive[index] = (this.isActive[index] === index) ? false : index;
    }
  }
}
</script>
