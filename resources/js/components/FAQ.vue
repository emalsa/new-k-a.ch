<template>
  <!-- FAQ -->
  <section id="fragen-und-antworten" class="sm:py-16 py-12 bg-gradient-gray2 overflow-hidden">
    <div id="faq" class="container px-4 mx-auto">
      <div class="max-w-md mx-auto mb-20">
        <h2 class="mb-7 font-heading font-semibold text-center text-4xl text-gray-900">Fragen?</h2>
        <p class="text-lg text-gray-600 text-center">Unten findest du die wichtigsten Fragen und Antworten über den
          Kirchenaustritt. Klicke einfach auf die Frage um deine Antwort einzublenden.</p>
      </div>
      <div class="max-w-4xl mx-auto mb-24">
        <ul class="space-y-4">
          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(9)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <h3 class="font-heading text-lg font-medium text-gray-400"> Gründe, die für einen Kirchenaustritt
                sprechen.</h3>
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
            <div class="panel" v-if="isActive[9] === 9">
              <p class="max-w-3xl mt-4 text-base text-gray-800">
                Ein Grund für einen Kirchenaustritt kann finanzieller Natur sein. Kirchen erheben in den meisten
                Kantonen Kirchensteuern von ihren Mitgliedern. Wenn du mit der Verwendung der
                Kirchenfinanzen nicht einverstanden bist oder einfach kein Geld für Kirchenbeiträge ausgeben möchten,
                könnte ein Austritt finanzielle Vorteile bringen.
              </p>
              <p class="max-w-3xl mt-4 text-base text-gray-800">
                Auch ein häufiger Grund ist der Verlust des Glaubens oder der Wertvorstellungen, die nicht mehr mit
                denen der Kirche übereinstimmen. Ein Austritt aus der Kirche kann ein logischer Schritt sein, wenn du
                das Gefühl hast, dass deine Überzeugungen und Werte nicht mehr von der Kirche repräsentiert werden.
              </p>
              <p class="max-w-3xl mt-4 text-base text-gray-800">
                Übrigens, auch nach deinem Austritt aus der Kirche hast du das Recht, auf dem Friedhof beerdigt zu
                werden. Der Friedhof ist Sache der Gemeinde. Eine Trauerfeier in der Kirche wird in der Regel nach dem
                Austritt aus der Kirche nicht durchgeführt, oder es muss mit der örtlichen Pfarrei besprochen werden.
              </p>
            </div>
          </li>

          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(10)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <h3 class="font-heading text-lg font-medium text-gray-400"> Gründe, die gegen einen Kirchenaustritt
                sprechen.</h3>
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
            <div class="panel" v-if="isActive[10] === 10">
              <p class="max-w-3xl mt-4 text-base text-gray-800">
                Gemeinschaft, Unterstützung und Gemeinschaftsgefühl können persönlich wichtige Gründe sein, in der
                Kirche zu bleiben. Kirchengemeinden bieten oft soziale Dienste und Aktivitäten an, die helfen
                können, Betroffene mit Gleichgesinnten zu vernetzen und Unterstützung in schwierigen Zeiten zu finden.
              </p>
              <p class="max-w-3xl mt-4 text-base text-gray-800">
                Das kulturelle Erbe, welches die Kirche repräsentiert, kann ebenfalls ein Grund sein, warum Menschen in
                der Kirche bleiben. Kirchen sind Orte, an denen Menschen seit Jahrhunderten ihre Glaubenspraktiken und
                Rituale ausüben. Wenn du also der Meinung bist, dass du durch den Verbleib in der Kirche dazu
                beitragen kannst, dieses kulturelle Erbe zu erhalten, kann ein Kirchenaustritt überdenkt werden.
              </p>
              <p class="max-w-3xl mt-4 text-base text-gray-800">
                Eine gute Übersicht was die Kirchen leisten findest du hier
                <a class="underline underline-offset-4 decoration-[2px]" href="https://www.kirchensteuern-sei-dank.ch"
                   target="_blank">https://www.kirchensteuern-sei-dank.ch</a>
              </p>
              <p class="max-w-3xl mt-4 text-base text-gray-800">
                Schlussendlich ist der Kirchenaustritt eine persönliche Entscheidung und wir wollen dich bezüglich
                Kirchenaustritt auf gar keinen Fall beeinflussen. Wenn du aus der Kirche austreten möchtest, hast du in
                der Schweiz das Recht jederzeit aus der Kirche auszutreten.
              </p>
            </div>
          </li>

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
                Für den Austritt aus der Kirche in der Schweiz muss die betreffende Person, die aus der Kirche austreten
                will, einen Brief per Post an die zuständige Kirchgemeinde senden.
              </p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">
                Es gibt kein Online-Portal, Formular oder ähnliches, das von der Kirche zur Verfügung gestellt wird, um
                den Kirchenaustritt zu erledigen. Du kannst dein Austrittsschreiben selbst verfassen oder wir übernehmen
                diese Aufgabe für dich.
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
                Jede Gemeinde oder Stadt ist einer bestimmten Kirchgemeinde zugeordnet, die jedoch nicht immer das
                Pfarramt oder die Adresse der Kirche in der Gemeinde ist. Oftmals scheitert der Kirchenaustritt genau an
                diesem Punkt: Das Austrittsschreiben wird an die falsche Kirchgemeinde geschickt.
              </p>

            </div>
          </li>

          <!--          <li id="garantie" class=" px-6 py-8 bg-gray-50 rounded-xl">-->
          <!--            <button @click="toggleItem(3)"-->
          <!--                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">-->
          <!--              <h3 class="font-heading text-lg font-medium text-gray-400">Was heisst <i>Garantierter Austritt</i>&nbsp;?-->
          <!--              </h3>-->
          <!--              <svg class="closed flex-shrink-0"-->
          <!--                   width="20"-->
          <!--                   height="20"-->
          <!--                   viewbox="0 0 20 20"-->
          <!--                   fill="none"-->
          <!--                   xmlns="http://www.w3.org/2000/svg">-->
          <!--                <path fill-rule="evenodd"-->
          <!--                      clip-rule="evenodd"-->
          <!--                      d="M0.750214 10C0.750214 15.108 4.89121 19.25 10.0002 19.25C15.1082 19.25 19.2502 15.108 19.2502 10C19.2502 4.892 15.1082 0.75 10.0002 0.75C4.89121 0.75 0.750214 4.892 0.750214 10Z"-->
          <!--                      stroke="#838EA4"-->
          <!--                      stroke-width="1.5"-->
          <!--                      stroke-linecap="round"-->
          <!--                      stroke-linejoin="round"></path>-->
          <!--                <path d="M6.52902 8.55774L10 12.0437L13.471 8.55774"-->
          <!--                      stroke="#838EA4"-->
          <!--                      stroke-width="1.5"-->
          <!--                      stroke-linecap="round"-->
          <!--                      stroke-linejoin="round"></path>-->
          <!--              </svg>-->
          <!--              <svg class="opened hidden flex-shrink-0"-->
          <!--                   width="20"-->
          <!--                   height="20"-->
          <!--                   viewbox="0 0 20 20"-->
          <!--                   fill="none"-->
          <!--                   xmlns="http://www.w3.org/2000/svg">-->
          <!--                <path fill-rule="evenodd"-->
          <!--                      clip-rule="evenodd"-->
          <!--                      d="M19.2498 10C19.2498 4.892 15.1088 0.75 9.99979 0.75C4.89179 0.75 0.749786 4.892 0.749786 10C0.749786 15.108 4.89179 19.25 9.99979 19.25C15.1088 19.25 19.2498 15.108 19.2498 10Z"-->
          <!--                      stroke="#45C1FF"-->
          <!--                      stroke-width="1.5"-->
          <!--                      stroke-linecap="round"-->
          <!--                      stroke-linejoin="round"></path>-->
          <!--                <path d="M13.471 11.4423L9.99998 7.95626L6.52898 11.4423"-->
          <!--                      stroke="#45C1FF"-->
          <!--                      stroke-width="1.5"-->
          <!--                      stroke-linecap="round"-->
          <!--                      stroke-linejoin="round"></path>-->
          <!--              </svg>-->
          <!--            </button>-->
          <!--            <div class="panel" v-if="isActive[3] === 3">-->
          <!--              <p class="max-w-3xl mt-4 text-base  text-gray-800">Unser Formular benötigt lediglich deine persönlichen-->
          <!--                Daten wie deinen Namen, deine Adresse und dein Geburtsdatum angeben. Wir haben die Adresse der-->
          <!--                zuständigen Kirchgemeinde bereits für dich und senden dir sogar das Austrittsschreiben zu. Du musst-->
          <!--                das Schreiben lediglich ausdrucken, unterschreiben und zur Post bringen. Eine mühsame Recherche der-->
          <!--                Kirchgemeinde entfällt also für dich und du musst kein eigenes Schreiben erstellen. Mit uns sparst du-->
          <!--                Zeit und Nerven.</p>-->
          <!--              <p class="max-w-3xl mt-4 text-base  text-gray-800">Falls uns bei der Kirchgemeinde ein Fehler unterläuft,-->
          <!--                erstatten wir dir selbstverständlich das Geld zurück. Ein Beispiel dafür wäre, wenn wir trotz Kontrolle-->
          <!--                die falsche Kirchgemeinde im Austrittsschreiben angeben. Zudem senden wir dir ein neues-->
          <!--                Austrittsschreiben mit der korrekten Kirchgemeinde zu.</p>-->
          <!--            </div>-->
          <!--          </li>-->

          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(4)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <span class="font-heading text-lg font-medium text-gray-400">Was geschieht nachdem ich das Austrittsschreiben an die Kirchgemeinde geschickt habe?</span>
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
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Etwa 4-8 Wochen nach dem Abschicken des
                Austrittsschreibens erhältst du eine Bestätigung von der Kirchgemeinde per Post. Die Kirchgemeinde
                informiert auch das Steueramt deiner Gemeinde über deinen Kirchenaustritt, damit du von der
                Kirchensteuer befreit wirst.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Allerdings empfiehlt es sich, dass du beim
                Steueramt deiner Gemeinde nach etwa zwei Wochen nach Erhalt der Bestätigung nachfragst.</p>
            </div>
          </li>

          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(5)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <span class="font-heading text-lg font-medium text-gray-400">Ist ein Gespräch erforderlich, wenn ich aus der Kirche austreten möchte?</span>
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
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Im Austrittsschreiben wird deutlich darauf hingewiesen,
                dass keine weiteren Kontaktaufnahmen erwünscht sind.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">In sehr wenigen Gemeinden kann der Austritt mit einem
                Gespräch verbunden sein, aber diese Fälle sind vernachlässigbar. Tatsächlich haben die entsprechenden
                Landeskirchen gesetzlich festgelegt, dass ein Gespräch verpflichtend ist diesen Gemeinden.</p>
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
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Der Kirchenaustritt verläuft in der Regel reibungslos.
                In manchen Fällen wird einem jedoch der Austritt erschwert, obwohl die Gründe rechtlich nicht
                standhalten. Normalerweise gewähren die betreffenden Institutionen den Kirchenaustritt ohne große
                Bürokratie.</p>
              <p class="max-w-3xl mt-4 text-base  text-gray-800">Das sind die häufigsten Gründe weshalb der Austritt
                erschwert wird.</p>
              <div class="max-w-3xl mt-4 text-base text-gray-800">
                <ul class="mb-3">
                  <li class="font-bold mb-2">Fehlendes Taufdatum oder Taufort</li>
                  <li>
                    Die häufigsten Gründe, aus denen der Austritt erschwert wird, sind ein fehlendes Taufdatum oder
                    Taufort. Dies ist jedoch kein Grund, um den Austritt zu verweigern, wenn man aus der Institution der
                    öffentlich-rechtlichen Landeskirche austreten möchte. In diesem Fall muss man nochmal klarstellen,
                    dass man nicht (nur) aus der Pfarrei austreten möchte sondern aus der "Institution der
                    öffentlich-rechtlichen Landeskirche" austreten möchte. Diese erhebt die Kirchensteuern.
                  </li>
                </ul>
                <ul class="mb-3">
                  <li class="font-bold mb-2">Es wird um Gründe für einen Austritt verlangt</li>
                  <li>Es ist nicht erforderlich, Gründe für den Austritt anzugeben. Es genügt zu erklären, dass man über
                    den Kirchenaustritt informiert ist, dass deine Entscheidung bereits getroffen wurde.
                  </li>
                </ul>
                <ul class="mb-3">
                  <li class="font-bold mb-2">Es wird um ein Gespräch gebeten</li>
                  <li>Erkläre dass dein Entscheid bereits gefallen ist und kein Gespräch von deiner Seite gewünscht ist.
                  </li>
                </ul>
                <ul class="mb-3">
                  <li class="font-bold mb-2">Keine Bestätigung nach 4-6 Wochen</li>
                  <li>Schicke einen eingeschriebenen Brief an die Kirchgemeinde und verlange eine Bestätigung von
                    deinem Kirchenaustritt innerhalb von einer Woche.
                  </li>
                </ul>
              </div>
            </div>
          </li>

          <li class=" px-6 py-8 bg-gray-50 rounded-xl">
            <button @click="toggleItem(7)"
                    class="accordion w-full flex justify-between items-center text-left font-semibold font-heading">
              <span
                class="font-heading text-lg font-medium text-gray-400">Für Kantone St. Gallen und beider Appenzell</span>
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
              <span
                class="font-heading text-lg font-medium text-gray-400">Wie erhalte ich das Austrittsschreiben?</span>
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
      <a
        class="close-menu group block max-w-max mx-auto font-heading font-medium text-gray-900 hover:text-gray-800 text-base overflow-hidden"
        href="#contact">
        <!--        <p class="mb-1">Didn’t find the answer? Contact us here</p>-->
        <div
          class="w-full transform -translate-x-0 group-hover:translate-x-full h-px bg-gradient-cyan transition ease-in-out duration-500"></div>
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
      isActive: [],
    };
  },
  methods: {
    toggleItem(index) {
      this.isActive[index] = (this.isActive[index] === index) ? false : index;
    },
  },
};
</script>
