    <div class="container w-full my-4 mx-auto">
        <h1 class="text-lg ">Convertidor de imagenes a Webp</h1>
    </div>
    <div class="container w-full mx-auto text-base flex flex-row">
        <div class="pr-2 w-1/2">
            <div class="bg-neutral-200 py-28 text-center rounded-lg transition-colors" id="dropArea">
                <h3 class="text-neutral-700">Arrastra y suelta tus imágenes</h3>
                <button class="bg-blue-500 hover:bg-blue-400 transition-colors text-neutral-100 font-semibold p-3 rounded-lg mt-2 shadow-lg">Seleccionar Archivos</button>
                <input type="file" accept="image/*" id="inputFile" name="inputFile[]" multiple hidden>
            </div>
        </div>
        <div class="w-1/6">
            <form class="flex flex-col" method="POST">
                <label for="factorCambio">Reducción de Calidad</label>
                <input type="range" name="factorCambio" id="factorCambio" step="10" min="50" value="100">
                <input class="bg-blue-700 hover:bg-blue-400 transition-colors text-neutral-100 font-semibold p-3 rounded-lg mt-2 cursor-pointer shadow-lg" id="btnConvertir" type="button" value="Convertir">
            </form>
        </div>
    </div>
    
    <div class="container w-full mx-auto my-4">
        <div class="pl-2 w-full">
            <h3>Imágenes Seleccionadas</h3>
            <div clas="flex flex-row w-full" id="nuevImg"></div>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const dropArea = document.getElementById('dropArea');
        const btnSubir = dropArea.querySelector('button');
        const inputFile = dropArea.querySelector('#inputFile');
        const nuevImg = document.getElementById('nuevImg');
        const btnConvertir = document.getElementById('btnConvertir');
        const blobImgs = [];

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
            dropArea.classList.add('bg-neutral-300');
        });
        dropArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropArea.classList.remove('bg-neutral-300');
            dropArea.classList.add('bg-neutral-200');
        });
        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            let files = e.dataTransfer.files;
            prevImagenes(files);
            dropArea.classList.remove('bg-neutral-300');
            dropArea.classList.add('bg-neutral-200');
        });

        const prevImagenes = async (files) => {
            for (let i = 0; i < files.length; i++) {
                let tipo = files[i].type;
                let formato = tipo.substring(0,tipo.indexOf('/'));
                let ext = tipo.substring(tipo.indexOf('/')+1,tipo.length);

                if(formato == 'image' && ext != 'gif'){
                    convertirImagen(files[i]);
                    // blobImgs.push(await convertirB64(files[i]));
                }else{
                    alert('Por favor solo sube imágenes');
                    /* inputFile.value = '';
                    return; */
                }
            }
            let btnsEliminar = document.getElementsByClassName('btnEliminar');
            for (const btnEliminar of btnsEliminar) {
                btnEliminar.addEventListener('click',(e)=>{
                    prevImg.removeChild(e.target.closest('.contImgSubida'));
                });
            }
        }

        const crearImagenTemporal = (img) => {
            let imgTmp = URL.createObjectURL(img);
            let nuevoDiv = document.createElement('div');
            let nuevaImg = document.createElement('img');
            let nuevoP = document.createElement('p');
            let nuevoBtnEliminar = document.createElement('button');
            // ------ Div contenedor de previsualizador de la imagen y su información
            nuevoDiv.setAttribute('class', 'w-full flex flex-row items-center justify-around my-2 border-b-2 contImgSubida');
            // ------ Creación de la imagen temporal
            nuevaImg.setAttribute('class', 'w-10 h-10 object-cover imgSubida');
            nuevaImg.src = imgTmp;
            // ------ Creación del nuevo parrafo con información de la imagen
            nuevoP.textContent = img.name;
            nuevoP.setAttribute('class', 'w-5/6 h-6 overflow-hidden');
            // ------ Creación del botón para descartar la imagen
            nuevoBtnEliminar.textContent = 'x';
            nuevoBtnEliminar.setAttribute('class', 'w-6 rounded-full hover:bg-neutral-200 btnEliminar');
            // ------ Incrustación de los nuevos elementos
            nuevoDiv.appendChild(nuevaImg);
            nuevoDiv.appendChild(nuevoP);
            nuevoDiv.appendChild(nuevoBtnEliminar);
            prevImg.appendChild(nuevoDiv);
        }

        btnConvertir.addEventListener('click',()=>{
            let data = new FormData();
            
            let blobs = JSON.stringify(blobImgs);
            data.append('blobs',blobs);
            fetch('<?= base_url('index.php/Inicio/convertir')?>',{
                method: 'POST',
                body: data
            }).then(r => console.log(r));
        });

        const convertirB64 = (img) => {
            return new Promise((resolve, reject)=>{
                const reader = new FileReader();
                reader.readAsDataURL(img);
                reader.onloadend = () => {
                    resolve(reader.result.split(',')[1]);
                };
            });
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
                canvas.width = objImg.width;
                canvas.height = objImg.height;
                ctx.drawImage(objImg, 0, 0);
                // Convirtiendo a webp
                let webpImg = canvas.toDataURL('image/webp');
                nuevaImg.setAttribute('class', 'w-10 h-10 object-cover imgNueva');
                nuevaImg.src = webpImg;
                // ------ Creación del botón para descargar la imagen
                nuevoBtnEliminar.textContent = 'Descargar';
                nuevoBtnEliminar.setAttribute('class', 'rounded-lg hover:bg-neutral-200 p-2');
                nuevoBtnEliminar.setAttribute('href', webpImg);
                nuevoBtnEliminar.setAttribute('download', nom);
                blobImgs.push(webpImg);
            }

            // ------ Creación del nuevo parrafo con información de la imagen
            let nombre = img.name;
            let nom = nombre.substring(0, nombre.lastIndexOf('.'));
            nuevoP.textContent = nom + '.webp';
            nuevoP.setAttribute('class', 'w-4/6 h-6 overflow-hidden');

            // ------ Incrustación de los nuevos elementos
            nuevoDiv.appendChild(nuevaImg);
            nuevoDiv.appendChild(nuevoP);
            nuevoDiv.appendChild(nuevoBtnEliminar);
            nuevImg.appendChild(nuevoDiv);
        }
    });
</script>
