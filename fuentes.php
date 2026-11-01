<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuentes y Créditos - Catálogo de Aves UFPS</title>
    <link rel="icon" href="Imagenes/logo.png" type="image/png">
    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C400%2C700%7CRoboto+Slab%3A400%2C700%7COpen+Sans%3A400%2C600&display=swap' media='all' />

    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/fuentes.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>
<body>

    <?php include "includes/header.php" ?>

    <header class="hero-catalogo">
        <div class="hero-info">
            <h1>Fuentes y Créditos</h1>
            <p>Origen de fotografías, videos, sonidos, árboles y glosario</p>
        </div>
    </header>

    <div class="contenedor">

        <p class="intro-texto">
            A continuación se detallan las fuentes utilizadas para la construcción de este catálogo.
        </p>

        <!-- INFORMACIÓN DE AVES -->
        <h2 class="titulo-seccion">Información de las Aves</h2>
        <div class="seccion">
            <div class="bloque-credito">
                <svg class="icono-svg" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path d="M4 6h16v12H4zM4 22h16v12H4zM4 38h16v8H4z" stroke="#D30F23" stroke-width="2.5" fill="none"/>
                    <path d="M26 14h18M26 22h18M26 30h14" stroke="#D30F23" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
                <div>
                    <h3>Estructura de la información en cada ficha técnica</h3>
                    <p>
                        Cada ficha distingue claramente dos tipos de información, tal como se estableció en la tesis:
                    </p>
                    <div class="nota-bloque nota-campo">
                        <h4>Registro en la UFPS (Trabajo de campo propio, 2026)</h4>
                        <ul>
                            <li>Zona(s) donde fue documentada la especie (Rectoría Z1, CREAD Z2, Abanico Z3, Zona Central Z4, Aulas Orientales Z5)</li>
                            <li>Fotografías tomadas en el campus por el autor</li>
                            <li>Conductas efectivamente observadas durante el muestreo</li>
                            <li>Vegetación utilizada cuando fue documentada en campo</li>
                        </ul>
                    </div>
                    <div class="nota-bloque nota-cientifica">
                        <h4>Información general de la especie (Fuentes científicas)</h4>
                        <ul>
                            <li>Taxonomía completa (Reino, Filo, Clase, Orden, Familia, Género, Especie, Autor)</li>
                            <li>Morfología general de la especie</li>
                            <li>Hábitat y distribución geográfica global</li>
                            <li>Alimentación y gremio trófico</li>
                            <li>Estado de conservación (UICN)</li>
                            <li>Información etológica complementaria</li>
                        </ul>
                    </div>
                    <p>
                        La información taxonómica, morfológica, etológica y de distribución general proviene de <strong>BirdLife International (2024)</strong> y otras fuentes científicas. La información de registro en el campus (zonas, fotos, conductas observadas, vegetación usada) proviene del <strong>trabajo de campo de la investigación, 2026</strong>.
                    </p>
                    <p>
                        La compilación, organización y adaptación al contexto del campus fue realizada por
                        <strong>Jonny Andrés Quintero Arciniegas</strong> para cada una de las 27 especies
                        documentadas durante el trabajo de campo.
                    </p>
                </div>
            </div>
        </div>

        <!-- FOTOGRAFÍAS -->
        <h2 class="titulo-seccion">Fotografías de las Aves</h2>
        <div class="seccion">
            <div class="bloque-credito">
                <svg class="icono-svg" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <rect x="6" y="10" width="36" height="28" rx="3" stroke="#D30F23" stroke-width="2.5"/>
                    <circle cx="18" cy="22" r="4" stroke="#D30F23" stroke-width="2.5"/>
                    <path d="M6 34 L14 26 L22 30 L32 18 L42 26 V35 C 42 37, 39 38, 36 38 H12 C9 38, 6 37, 6 35 V34 Z" fill="#D30F23" opacity="0.15"/>
                </svg>
                <div>
                    <h3>Todas las fotografías de aves fueron tomadas por:</h3>
                    <p class="nombre-autor">Jonny Andrés Quintero Arciniegass</p>
                    <p>Las imágenes fueron capturadas de forma directa en campo, en las distintas zonas del campus de la <strong>Universidad Francisco de Paula Santander (UFPS)</strong>, Cúcuta, Norte de Santander, Colombia, como parte del trabajo de grado de la Licenciatura en Ciencias Naturales y Educación Ambiental.</p>
                    <p>Cada ave aparece identificada con su nombre común, nombre científico, y se acompañan de fotografías en distintos ángulos para facilitar su reconocimiento morfológico en campo.</p>
                </div>
            </div>
        </div>

        <!-- VIDEOS DE ZONAS -->
        <h2 class="titulo-seccion">Videos de las Zonas del Campus</h2>
        <div class="seccion">
            <div class="bloque-credito">
                <svg class="icono-svg" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <rect x="6" y="12" width="36" height="24" rx="3" stroke="#D30F23" stroke-width="2.5"/>
                    <polygon points="18,18 32,24 18,30" fill="#D30F23"/>
                    <line x1="6" y1="28" x2="16" y2="28" stroke="#D30F23" stroke-width="2.5" stroke-linecap="round"/>
                    <line x1="34" y1="36" x2="42" y2="36" stroke="#D30F23" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
                <div>
                    <h3>Todos los videos de las zonas fueron grabados por:</h3>
                    <p class="nombre-autor">Jonny Andrés Quintero Arciniegass</p>
                    <p>Las grabaciones aéreas y en tierra de cada zona del campus (Abanico, Aulas Orientales, CREAD, Rectoría y Zona Central) fueron realizadas con dron y cámara, cubriendo los recorridos y hábitats característicos de cada área. Los videos permiten contextualizar geográficamente el avistamiento de cada especie dentro de la universidad.</p>
                    <p><strong>Zonas documentadas:</strong> Abanico, Aulas Orientales, CREAD, Rectoría, Zona Central.</p>
                </div>
            </div>
        </div>

        <!-- ÁRBOLES Y RECURSOS DEL HÁBITAT -->
        <h2 class="titulo-seccion">Árboles y recursos del hábitat</h2>
        <div class="seccion">
            <div class="bloque-credito">
                <svg class="icono-svg" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path d="M24 6 C14 6, 8 14, 10 22 C8 24, 8 30, 14 30 C16 34, 22 34, 24 30 C26 34, 32 34, 34 30 C40 30, 40 24, 38 22 C40 14, 34 6, 24 6 Z"
                          fill="#D30F23" opacity="0.15" stroke="#D30F23" stroke-width="2.5" stroke-linejoin="round"/>
                    <path d="M24 28 L24 44" stroke="#80401B" stroke-width="3.5" stroke-linecap="round"/>
                </svg>
                <div>
                    <h3>Fotografías de los árboles y plantas</h3>
                    <p class="nombre-autor">Jonny Andrés Quintero Arciniegass</p>
                    <p>
                        Las imágenes de los 15 árboles y plantas del campus —<strong>Saman, Camajón, Jero,
                        Mango, Palma real, Chiminango, Grama, Ficus benjamina, Ixora, Achira, Oití,
                        Naranja agria, Marañón, Urapo y Buganvilla</strong>— fueron tomadas por
                        <strong>Jonny Andrés Quintero Arciniegass</strong> de forma directa en campo, en las
                        distintas zonas verdes de la <strong>Universidad Francisco de Paula Santander
                        (UFPS)</strong>, Cúcuta.
                    </p>
                    <p>
                        Cada fotografía documenta la vegetación presente en las zonas de estudio. En la tesis se
                        atribuye una relación ave–planta únicamente cuando existe evidencia observada en campo
                        (forrajeo, percha, anidación) o respaldo bibliográfico específico; la mera coexistencia
                        en el campus no demuestra asociación ecológica.
                    </p>
                    <p>
                        La descripción botánica de cada árbol (nombre común, nombre científico, familia y
                        notas ecológicas) fue redactada por el autor a partir de la observación directa en
                        campo y de la consulta del documento <em>Vegetación y recursos del hábitat</em>
                        elaborado durante el trabajo de grado.
                    </p>
                </div>
            </div>
        </div>

        <!-- GLOSARIO ILUSTRADO -->
        <h2 class="titulo-seccion">Glosario ilustrado</h2>
        <div class="seccion">
            <div class="bloque-credito">
                <svg class="icono-svg" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" stroke="#D30F23" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M6.5 2H20v44H6.5A2.5 2.5 0 0 1 4 41.5v-36A2.5 2.5 0 0 1 6.5 2z" stroke="#D30F23" stroke-width="2.5" stroke-linejoin="round"/>
                    <path d="M26 10h14M26 18h14M26 26h10M26 34h10" stroke="#D30F23" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
                <div>
                    <h3>Ilustraciones del glosario ornitológico</h3>
                    <p class="nombre-autor">Jonny Andrés Quintero Arciniegass <span class="autor-ayuda">— con la ayuda de ChatGPT</span></p>
                    <p>
                        Las 105 imágenes del glosario —que cubren términos de
                        <strong>alimentación, anatomía, comportamiento, conservación, hábitat</strong>
                        y <strong>taxonomía y clasificación</strong>— fueron elaboradas por
                        <strong>Jonny Andrés Quintero Arciniegass</strong> con la ayuda de
                        <strong>ChatGPT</strong>, modelo de lenguaje de OpenAI.
                    </p>
                    <p>
                        Cada ilustración acompaña a un término ornitológico y muestra de forma visual su
                        significado, facilitando la comprensión del vocabulario técnico utilizado en las
                        fichas de las aves y en el módulo de árboles.
                    </p>
                    <p>
                        Los nombres visibles de cada tarjeta siguen la ortografía y la normativa de la
                        <strong>Real Academia Española (RAE)</strong>: incluyen tildes, la letra ñ y
                        mayúsculas únicamente en la primera palabra de cada término.
                    </p>
                </div>
            </div>
        </div>

        <!-- SONIDOS YouTube Shorts -->
        <h2 class="titulo-seccion">Sonidos de las Aves (YouTube Shorts)</h2>
        <div class="seccion">
            <p>
                Los audios del canto/llamado de cada especie provienen de la plataforma <strong>YouTube</strong>,
                específicamente del formato <strong>Shorts</strong> (videos verticales cortos). Cada enlace fue buscado
                y verificado manualmente, uno por uno, para confirmar que corresponde al canto/llamado del nombre
                científico correcto.
            </p>

            <table class="tabla-fuentes">
                <thead>
                    <tr>
                        <th>Nombre Común</th>
                        <th>Nombre Científico</th>
                        <th>Video ID (Short)</th>
                        <th>Enlace</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Periquito de Barbilla Naranja</td>
                        <td class="col-cientifico">Brotogeris jugularis</td>
                        <td class="col-videoid">XOTVMTx74Bo</td>
                        <td><a href="https://www.youtube.com/shorts/XOTVMTx74Bo" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Pájaro carpintero de vientre rojo</td>
                        <td class="col-cientifico">Melanerpes carolinus</td>
                        <td class="col-videoid">Ks6g6FEFEUs</td>
                        <td><a href="https://www.youtube.com/shorts/Ks6g6FEFEUs" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Tangara de Verano</td>
                        <td class="col-cientifico">Piranga rubra</td>
                        <td class="col-videoid">w_vrgwY5FnA</td>
                        <td><a href="https://www.youtube.com/shorts/w_vrgwY5FnA" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Colibrí de Cola Rojiza</td>
                        <td class="col-cientifico">Amazilia tzacatl</td>
                        <td class="col-videoid">bYzG1CpwCYE</td>
                        <td><a href="https://www.youtube.com/shorts/bYzG1CpwCYE" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Tirano Tropical</td>
                        <td class="col-cientifico">Tyrannus melancholicus</td>
                        <td class="col-videoid">kFM_cwhLuxk</td>
                        <td><a href="https://www.youtube.com/shorts/kFM_cwhLuxk" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Pinzón Azafrán</td>
                        <td class="col-cientifico">Sicalis flaveola</td>
                        <td class="col-videoid">ggoW2o5It8E</td>
                        <td><a href="https://www.youtube.com/shorts/ggoW2o5It8E" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Tortolita Rojiza</td>
                        <td class="col-cientifico">Columbina talpacoti</td>
                        <td class="col-videoid">MPfqGpWXFbM</td>
                        <td><a href="https://www.youtube.com/shorts/MPfqGpWXFbM" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Semillero Pardo</td>
                        <td class="col-cientifico">Asemospiza obscura</td>
                        <td class="col-videoid">kMJWdU2nzno</td>
                        <td><a href="https://www.youtube.com/shorts/kMJWdU2nzno" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Sirirí Rayado</td>
                        <td class="col-cientifico">Myiodynastes maculatus</td>
                        <td class="col-videoid">AR-x7LzGMDJ</td>
                        <td><a href="https://www.youtube.com/shorts/AR-x7LzGMDJ" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Paloma Bravía</td>
                        <td class="col-cientifico">Columba livia</td>
                        <td class="col-videoid">qZLNo6RBuIA</td>
                        <td><a href="https://www.youtube.com/shorts/qZLNo6RBuIA" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Caracara Crestado</td>
                        <td class="col-cientifico">Caracara plancus cheriway</td>
                        <td class="col-videoid">HK3qKTvBdeQ</td>
                        <td><a href="https://www.youtube.com/shorts/HK3qKTvBdeQ" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Perico Cara Sucia</td>
                        <td class="col-cientifico">Eupsittula pertinax</td>
                        <td class="col-videoid">0RX5FOOJbvY</td>
                        <td><a href="https://www.youtube.com/shorts/0RX5FOOJbvY" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Carpintero Real</td>
                        <td class="col-cientifico">Dryocopus lineatus</td>
                        <td class="col-videoid">2yWpu0RHhh8</td>
                        <td><a href="https://www.youtube.com/shorts/2yWpu0RHhh8" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Gavilán Caminero</td>
                        <td class="col-cientifico">Rupornis magnirostris</td>
                        <td class="col-videoid">qWHc0OQbbts</td>
                        <td><a href="https://www.youtube.com/shorts/qWHc0OQbbts" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Buitre Negro</td>
                        <td class="col-cientifico">Coragyps atratus</td>
                        <td class="col-videoid">ioJoSCUME2k</td>
                        <td><a href="https://www.youtube.com/shorts/ioJoSCUME2k" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Amazona de Corona Amarilla</td>
                        <td class="col-cientifico">Amazona ochrocephala</td>
                        <td class="col-videoid">LcfBhw1inUU</td>
                        <td><a href="https://www.youtube.com/shorts/LcfBhw1inUU" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Guacamayo severo</td>
                        <td class="col-cientifico">Ara severus</td>
                        <td class="col-videoid">vza4ZjQkRXk</td>
                        <td><a href="https://www.youtube.com/shorts/vza4ZjQkRXk" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Cuco Ardilla</td>
                        <td class="col-cientifico">Piaya cayana</td>
                        <td class="col-videoid">L79mI4HVFc8</td>
                        <td><a href="https://www.youtube.com/shorts/L79mI4HVFc8" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Garrapatero Piquiliso</td>
                        <td class="col-cientifico">Crotophaga ani</td>
                        <td class="col-videoid">Ulhk9csgfXM</td>
                        <td><a href="https://www.youtube.com/shorts/Ulhk9csgfXM" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Chimachima</td>
                        <td class="col-cientifico">Daptrius chimachima</td>
                        <td class="col-videoid">iZ3TEXp33gE</td>
                        <td><a href="https://www.youtube.com/shorts/iZ3TEXp33gE" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Eufonía Violácea</td>
                        <td class="col-cientifico">Euphonia violacea</td>
                        <td class="col-videoid">QKp2_LGngpw</td>
                        <td><a href="https://www.youtube.com/shorts/QKp2_LGngpw" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Tero</td>
                        <td class="col-cientifico">Vanellus chilensis</td>
                        <td class="col-videoid">lt_viD5Q7f8</td>
                        <td><a href="https://www.youtube.com/shorts/lt_viD5Q7f8" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Carpintero Pechipunteado</td>
                        <td class="col-cientifico">Colaptes punctigula</td>
                        <td class="col-videoid">YdlGsrodoZQ</td>
                        <td><a href="https://www.youtube.com/shorts/YdlGsrodoZQ" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Azulejo</td>
                        <td class="col-cientifico">Thraupis episcopus</td>
                        <td class="col-videoid">ZFlAKbdeqYk</td>
                        <td><a href="https://www.youtube.com/shorts/ZFlAKbdeqYk" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Mielero Común</td>
                        <td class="col-cientifico">Coereba flaveola</td>
                        <td class="col-videoid">8GvR_n8AAQQ</td>
                        <td><a href="https://www.youtube.com/shorts/8GvR_n8AAQQ" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Picabuey</td>
                        <td class="col-cientifico">Machetornis rixosa</td>
                        <td class="col-videoid">aMZgN8hJByY</td>
                        <td><a href="https://www.youtube.com/shorts/aMZgN8hJByY" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                    <tr>
                        <td>Sinsonte Tropical</td>
                        <td class="col-cientifico">Mimus gilvus</td>
                        <td class="col-videoid">JibZipLeOrk</td>
                        <td><a href="https://www.youtube.com/shorts/JibZipLeOrk" target="_blank" rel="noopener">Ver Short</a></td>
                    </tr>
                </tbody>
            </table>
            <p class="nota">
                La búsqueda y verificación de cada Short se hizo manualmente, uno por uno, confirmando que el canto/llamado corresponde al nombre de la especie.
            </p>
        </div>

        <!-- SÍMBOLOS -->
        <h2 class="titulo-seccion">Símbolos e Iconos</h2>
        <div class="seccion">
            <div class="bloque-credito">
                <svg class="icono-svg" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <rect x="10" y="8" width="28" height="32" rx="2" stroke="#D30F23" stroke-width="2.5"/>
                    <circle cx="20" cy="20" r="4" stroke="#D30F23" stroke-width="2"/>
                    <path d="M14 28 L18 28 L20 23 L22 28 L26 28 L28 32 L16 32 Z" fill="#D30F23" opacity="0.2" stroke="#D30F23" stroke-width="2"/>
                </svg>
                <div>
                    <h3>Isotipos y símbolos de clasificación</h3>
                    <p>
                        Los iconos utilizados para representar la dieta, actividad, comportamiento social,
                        estado de conservación y tipo de hábitat de cada ave fueron diseñados por
                        <strong>Jonny Andrés Quintero Arciniegass</strong> con la ayuda de <strong>ChatGPT</strong>.
                        Se elaboraron en formato <strong>.ico</strong> y se emplean en la ficha técnica de cada
                        especie para facilitar la interpretación visual de las características ecológicas y conductuales.
                    </p>
                    <p>
                        <strong>Fuente de la clasificación:</strong> La categorización de cada ave
                        (dieta, actividad, comportamiento social, estado de conservación y tipo de pata)
                        se basa en los datos proporcionados por <strong>BirdLife International (2024)</strong>.
                    </p>
                    <p><strong>Categorías representadas:</strong> Actividad diurno/nocturno, Comportamiento social (grupal, pareja, solitario), Tipo de alimentación (insectívoro, frugívoro, granívoro, nectívoro, carroñero), Estados de conservación y morfología de patas.</p>
                </div>
            </div>
        </div>

        <!-- AGRADECIMIENTOS -->
        <h2 class="titulo-seccion">Agradecimientos</h2>
        <div class="seccion">
            <p>
                <strong>Jonny Andrés Quintero Arciniegass</strong>, autor del proyecto.
                Estudiante de la Licenciatura en Ciencias Naturales y Educación Ambiental de la Universidad
                Francisco de Paula Santander, Cúcuta, Colombia.
            </p>
            <p>
                <strong>Diseño y desarrollo web:</strong> Samuel.ProCode.
            </p>
            <p>
                <strong>Fotografía de aves, videos de zonas y fotografía de árboles:</strong>
                trabajo de campo y grabación realizados por el autor en el campus de la UFPS, Cúcuta.
            </p>
            <p>
                <strong>Ilustraciones del glosario:</strong> elaboradas por el autor con la ayuda de
                ChatGPT (OpenAI), siguiendo la ortografía de la Real Academia Española.
            </p>
            <p>
                <strong>Investigación de sonidos:</strong> Búsqueda y verificación de cada YouTube Short
                realizada manualmente, uno por uno, para las especies documentadas.
                Cada enlace fue verificado para coincidir con el canto/llamado del nombre científico correspondiente.
            </p>
            <p>
                <strong>Institución:</strong> Universidad Francisco de Paula Santander (UFPS).
                Área de investigación en campus: Abanico, Aulas Orientales, CREAD, Rectoría, Zona Central.
            </p>
        </div>

    </div>

    <?php include "includes/footer.php" ?>

    <script src="scripts/fuentes.js"></script>
</body>
</html>
