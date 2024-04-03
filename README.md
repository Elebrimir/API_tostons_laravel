<p align="center"><a href="https://127.0.0.1:8000" target="_blank"><img src="./resources/img/Tostonet-removebg-preview.png" width="200" alt="TOSTONS WEB"></a></p>

 <h1 style="text-align: center;">TOSTONS WEB</h1>

<p align="center">
<a href="https://img.shields.io/github/license/Elebrimir/API_tostons_laravel?style=plastic&labelColor=%23333333">
    <img src="https://img.shields.io/github/license/Elebrimir/API_tostons_laravel?style=plastic&labelColor=%23333333" alt="License">
</a>
<a href="https://img.shields.io/github/languages/top/Elebrimir/API_tostons_laravel?style=plastic">
    <img src="https://img.shields.io/github/languages/top/Elebrimir/API_tostons_laravel?style=plastic" alt="commits">
</a>
<a href="https://img.shields.io/github/commit-activity/t/Elebrimir/API_tostons_laravel?style=plastic&logo=git&logoColor=orange&labelColor=%23333333&color=orange">
    <img src="https://img.shields.io/github/commit-activity/t/Elebrimir/API_tostons_laravel?style=plastic&logo=git&logoColor=orange&labelColor=%23333333&color=orange" alt="commits">
</a>
<a href="https://img.shields.io/github/last-commit/Elebrimir/API_tostons_laravel/main?display_timestamp=committer&style=plastic&logo=github&labelColor=%23333333">
    <img src="https://img.shields.io/github/last-commit/Elebrimir/API_tostons_laravel/main?display_timestamp=committer&style=plastic&logo=github&labelColor=%23333333&color=yellow" alt="commits">
</a>
</p>

_Pablo Cortés Bravo /_
_2n DAW Semipresencial /_
_IES L'Estació, Ontinyent_

# Projecte Final de Mòdul

## Aplicació Web per a la Gestió i Organització de un Torneig per al joc de Taula Blood Bowl.

L’Aplicació consisteix en una web amb capacitat de gestionar un torneig de Blood Bowl, un joc de taula
del finals dels anys 80 però que avui en día continúa jungant-se a nivell mundial, l'aplicació contindrà una vegada acabada el següent:

-   Perfil de Administrador i Superusuari per a tindre accés a una serie de enpoints on es podrà
    gestionar dades del torneig, dels jusgadors, dels regals, reglamentació, etc.
-   Perfil d’Usuari per a cada Jugador en la que tindran accés a les dades personals i on podran
    adjuntar i validar l’alineació del equip amb el que participen (falta decidir si per mitjà d’un formulari
    o validant un excel pre-formatejat que ja existeix per a tal efecte).
    -Diversos endpoints més, alguns dels cuals sols es podran accedir el dia abans del torneig, son
    necessaris com a mínim:
-   El llistat de jugadors i l’alineació de tots els equips participants (S’obri el dia abans del torneig).
-   Els emparellaments de cada ronda. (Obert per defecte).
-   La classificació ‘en directe’ del torneig, ha de tindre un temporitzador en directe de la ronda en
    curs, ja que aquestes están limitades a un temps definit de 2 hores i 30 minuts, i ha de anar mostrant les diferents classificacions que hi han.
-   Secció de partit _(La més important)_, normalment s’utilitza un acta de partit escrita a boli i després
    s’entrega a la taula d’organització per a introduir el resultat; l'idea es que quan es llançi una ronda es
    podrà accedir a cada enfrontament desde el mòvil, i en viu, anar afegint l'informació de la ronda. Aquesta vista ha de anar actualitzant la classifició i els resultats durant la mateixa ronda de joc (És el punt més
    critic de tot el projecte, perque s’haurà de validar que sols els jugadors de cada enfrontament siguen
    els que puguen accedir al enfrontament que els pertoca per actualitzar les dades del encontre; a més,
    el endpoint de la classifiació i resultats haurà d’anar actualitzant-se cada pocs segons per a que done
    la sensació de ser en directe i que vaja arreplegant les dades de 35 partits alhora, que és el que tenim
    ara a dia de hui, però que en un futur proper podriem arribar a 50 partits alhora, es a dir 100
    jugadors al mateix temps.)
-   Secció de rondes (Sols admins i organitzadors), es la part on s’ha de escriure tota la lógica per a
    realitzar els emparellaments d’acord al métode Suïss, aquesta secció també és molt important ja que
    és la que definirà les rondes de joc i ha de complir una serie de requisitis molt estrictes per a que
    l’experiencia siga el millor posible, hi ha una aplicació anomenada Score de la que hauría d'obtindre la majoria de l'informació per a realitzar el mateix en la API.
-   Una secció amb els regals a sortejar durant el dia, haurà de tindre un llançador de sorteig aleatori
sobre el llistat de jugadors participants i un registre de tots els jugadors que han sigut agraciats per a
eliminarlos de la llista dels sortejos que falten.
- Opcionals (Aquestes seccións segurament seràn d’accés públic sense necessitat d’estar registrat al sistema):

-   Historial de Edicions anteriors amb tots el guanyador de totes les categories del torneig.
-   Apartat amb fotos i imatges de premis, patrocinadors, etc.
-   Secció de enllaços d’interés a diverses pàgines, forums i grups de xaxes socials (Telegram,
    Whatsapp,...)
    Alguna cosa més que pot anar eixint amb el feedback, quan es comente amb companys d'organització del torneig i per supost amb jugadors que façen ús de la web.








## DOCKER, DIGITAL OCEAN I DEPLOY WEB

En Docker ens hem centrat en crear contenedors per executar aplicacions en un entorn virtualizat. Amb Docker podem crear contenidor que cadascún tinga un servici. En aquest cas PHP, Nginx i Node.



### DOCKER

Docker és una plataforma de virtualització que permet als desenvolupadors crear, implementar i executar aplicacions de manera lleugera i portàtil en entorns de contenidors. En lloc de virtualitzar tot el sistema operatiu, com ho fa la virtualització tradicional, Docker utilitza els contenidors per a encapsular aplicacions juntament amb les seves dependencies i llibreries necessàries per a funcionar.

Aquests contenidors són independents, lleugers i es poden executar en qualsevol lloc on Docker estigui instal·lat, ja sigui en entorns de desenvolupament, servidors de producció o fins i tot en la núvol. Això permet als desenvolupadors crear un entorn de desenvolupament consistent i replicable, assegurant que les aplicacions funcionin de la mateixa manera en tots els entorns.

Una de les principals avantatges de Docker és la seva eficiència i rapidesa. Els contenidors es poden crear, implementar i escalar de manera molt ràpida, ja que comparteixen els recursos del sistema host i no requereixen l'execució d'un sistema operatiu complet per a cada aplicació.

En resum, Docker simplifica el procés de desenvolupament i implementació d'aplicacions al proporcionar un entorn de contenidors lleuger i portàtil, que permet als desenvolupadors treballar de manera més eficient i escalable en tots els entorns.

Per la instalació de docker hem utilitzar unes guies que ens han ajudat

[Dockerfile Nose](https://medium.com/@hafizzeeshan619/effortlessly-dockerize-your-laravel-vue-application-a-step-by-step-guide-906407eb7549)

[Dockerfile Laravel](https://medium.com/@faidfadjri/how-to-setup-laravel-nginx-using-docker-2023-ba9de4b60d04)



### DIGITAL OCEAN
DigitalOcean és una empresa proveïdora de serveis d'infraestructura a la núvol, que ofereix servidors virtuals (també coneguts com a instàncies o droplets), emmagatzematge a la núvol, xarxes i altres serveis relacionats. És coneguda pel seu enfocament en la simplicitat i la facilitat d'ús, especialment per a desenvolupadors i petites empreses.

Els serveis de DigitalOcean estan dissenyats per ser accessibles per a usuaris amb diferents nivells d'experiència tècnica. Ofereixen una varietat d'opcions de configuració per als seus servidors virtuals, permetent als usuaris escalars els seus recursos de manera flexible segons les necessitats de la seva aplicació o projecte.

DigitalOcean també ofereix una àmplia gamma de guies i tutorials a la seva comunitat en línia, la qual ajuda als usuaris a aprendre sobre diferents aspectes de la computació a la núvol i a resoldre problemes comuns. Això ha contribuït a la seva popularitat entre la comunitat de desenvolupadors i emprenedors.

- Levantaner el servidor
- Instalar al servidor Digital ocean
    - [Install docker](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-22-04)

    - [Install docker-compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-22-04)



### DEPLOY AMB ANSIBLE

Ansible és una eina de gestió de la configuració i automatització d'infraestructures, àmpliament utilitzada en entorns de tecnologia de la informació i desenvolupament de programari. Permet als administradors de sistemes automatitzar tasques repetitives, com la configuració de servidors, implementacions d'aplicacions, gestió de configuracions i orquestació de serveis en un entorn informàtic.

Una de les característiques principals d'Ansible és la seva simplicitat d'ús i la seva facilitat d'aprenentatge, ja que utilitza un llenguatge de descripció de tasques senzill i basat en YAML (YAML Ain't Markup Language). Això fa que sigui més accessible per a administradors de sistemes i desenvolupadors amb diferents nivells d'experiència.

Ansible funciona mitjançant l'enviament de mòduls a agents remots per a executar tasques específiques, sense necessitat d'instal·lar cap agent permanent a les màquines objectiu. Això fa que sigui més lleuger i fàcil de gestionar en comparació amb altres eines similars.

En resum, Ansible simplifica la gestió i automatització de la infraestructura informàtica, permetent als equips de TI i desenvolupadors estalviar temps i recursos mitjançant la automatització de tasques rutinàries i repetitives.

[Tutorial de Ansible](https://www.digitalocean.com/community/tutoials/how-to-install-and-configure-ansible-on-ubuntu-22-04)

```bash
$ cd deploy/ansible/

$ ansible-playbook -i inventory/inventario download_repository.yml
```


</blockquote>

---

**Actualización dia 03-04-2024**

[Desarrollar Algoritmo Emparejamientos Torneo #7
](https://github.com/Elebrimir/API_tostons_laravel/issues/7#issuecomment-2035359997)
