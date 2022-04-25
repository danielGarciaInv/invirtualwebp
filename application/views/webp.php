    <div class="container w-11/12 mx-auto my-4 lg:w-full">
        <h1 class="text-lg ">Convertidor de imagenes a Webp</h1>
    </div>
    <div class="container w-11/12 mx-auto lg:w-full text-base flex flex-col md:flex-row">
        <div class="w-full md:w-1/6 mr-4 ">
            <h2 class="font-semibold mb-4">1. Ajustes (Opcionales)</h2>
            <form class="flex flex-col" method="POST">
                <label for="factorCalidad">Reducción de Calidad</label>
                <input type="range" name="factorCalidad" id="factorCalidad" step="10" min="50" value="100">
                <p id="indicadorCalidad" >100</p>

                <label for="factorTamano">Reducción de Tamaño</label>
                <input type="range" name="factorTamano" id="factorTamano" step="10" min="50" value="100">
                <p id="indicadorTamano">100%</p>
            </form>
        </div>
        <div class="w-full my-2 md:m-0 md:w-1/2">
            <h2 class="font-semibold mb-4">2. Selecciona tus Imágenes</h2>
            <div class="bg-neutral-200 py-28 text-center rounded-lg transition-colors" id="dropArea">
                <h3 class="text-neutral-700">Arrastra y suelta tus imágenes ó</h3>
                <button class="bg-blue-500 hover:bg-blue-400 transition-colors text-neutral-100 font-semibold p-3 rounded-lg mt-2">Selecciona Archivos</button>
                <input type="file" accept="image/*" id="inputFile" name="inputFile[]" multiple hidden>
            </div>
        </div>
    </div>

    <div class="container w-11/12 mx-auto my-4 md:w-full flex flex-row">
        <div class="w-full md:w-1/2">
            <h3 class="font-semibold mb-4">3. Descarga tus nuevas imágenes</h3>
            <div clas="flex flex-row w-full" id="nuevImg"></div>
        </div>
    </div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const dropArea = document.getElementById('dropArea');
        const btnSubir = dropArea.querySelector('button');
        const inputFile = dropArea.querySelector('#inputFile');
        const nuevImg = document.getElementById('nuevImg');
        const prevImg = document.getElementById('prevImg');
        const factorCalidad = document.getElementById('factorCalidad');
        const factorTamano = document.getElementById('factorTamano');
        const indicadorCalidad = document.getElementById('indicadorCalidad');
        const indicadorTamano = document.getElementById('indicadorTamano');

        factorCalidad.addEventListener('change',()=>{
            indicadorCalidad.innerText = factorCalidad.value;
        });
        factorTamano.addEventListener('change', () => {
            indicadorTamano.innerText = factorTamano.value + '%';
        });

        btnSubir.addEventListener('click', e => inputFile.click());

        // ----------------------- Detecta cambios en el input de tipo file
        inputFile.addEventListener('change', () => {
            dropArea.classList.remove('bg-neutral-200');
            dropArea.classList.add('bg-neutral-300');
            prevImagenes(inputFile.files);
        });

        // ----------------------- Arrastrar y soltar
        dropArea.addEventListener('dragover',(e) => {
            e.preventDefault();
            dropArea.classList.remove('bg-neutral-200');
            dropArea.classList.add('bg-blue-200');
        });
        dropArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropArea.classList.remove('bg-blue-200');
            dropArea.classList.add('bg-neutral-200');
        });
        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            let files = e.dataTransfer.files;
            prevImagenes(files);
            dropArea.classList.remove('bg-blue-200');
            dropArea.classList.add('bg-neutral-200');
        });

        const prevImagenes = async (files) => {
            for (let i = 0; i < files.length; i++) {
                let tipo = files[i].type;
                let formato = tipo.substring(0,tipo.indexOf('/'));
                let ext = tipo.substring(tipo.indexOf('/')+1,tipo.length);

                if(formato == 'image' && ext != 'gif'){
                    // crearImagenTemporal(files[i]);
                    convertirImagen(files[i]);
                }else{
                    alert('Por favor solo sube imágenes');
                }
            }
            let btnsEliminar = document.getElementsByClassName('btnEliminar');
            for (const btnEliminar of btnsEliminar) {
                btnEliminar.addEventListener('click',(e)=>{
                    prevImg.removeChild(e.target.closest('.contImgSubida'));
                });
            }
        }

        const convertirImagen = (img) => {
            let src = URL.createObjectURL(img);
            let nuevoDiv = document.createElement('div');
            let nuevaImg = document.createElement('img');
            let nuevoP = document.createElement('p');
            let nuevoBtnEliminar = document.createElement('a');

            // ------ Div contenedor de previsualizador de la imagen y su información
            nuevoDiv.setAttribute('class', 'w-full flex flex-row items-center justify-around my-2 border-b-2');

            // ------ Creación de la nueva imagen en webp
            let canvas = document.createElement('canvas');
            let ctx = canvas.getContext('2d');
            let objImg = new Image();
            objImg.src = src;

            objImg.onload = function () {
                let wi = objImg.width * (factorTamano.value / 100)
                let he = objImg.height * (factorTamano.value / 100);
                canvas.width = wi;
                canvas.height = he;
                ctx.drawImage(objImg, 0, 0, wi, he);
                // Convirtiendo a webp
                let webpImg;
                if(factorCalidad.value > 90){
                    webpImg = canvas.toDataURL('image/webp');
                }else{
                    webpImg = canvas.toDataURL('image/webp', factorCalidad.value / 100);
                }
                nuevaImg.setAttribute('class', 'w-10 h-10 object-cover imgNueva');
                nuevaImg.src = webpImg;
                // ------ Creación del botón para descargar la imagen
                nuevoBtnEliminar.textContent = 'Descargar';
                nuevoBtnEliminar.setAttribute('class', 'rounded-lg hover:bg-neutral-200 p-2');
                nuevoBtnEliminar.setAttribute('href', webpImg);
                nuevoBtnEliminar.setAttribute('download', nom);
            }

            // ------ Creación del nuevo parrafo con información de la imagen
            let nombre = img.name;
            let nom = nombre.substring(0, nombre.lastIndexOf('.'));
            nuevoP.textContent = nom + '.webp';
            nuevoP.setAttribute('class', 'w-3/6 md:w-4/6 h-6 overflow-hidden');

            // ------ Incrustación de los nuevos elementos
            nuevoDiv.appendChild(nuevaImg);
            nuevoDiv.appendChild(nuevoP);
            nuevoDiv.appendChild(nuevoBtnEliminar);
            nuevImg.appendChild(nuevoDiv);
        }

    });
</script>
