    <div class="container w-11/12 mx-auto my-4 lg:w-full">
        <h1 class="text-lg ">Generador de Códigos QR</h1>
    </div>
    <div class="container w-11/12 mx-auto lg:w-full text-base flex flex-col md:flex-row">
        <div class="w-full flex flex-col md:flex-row">
            <div class="w-full md:w-4/12 pr-4">
                <h2 class="font-semibold mb-4">1. Información</h2>
                <form class="flex flex-col" id="formGenerarQR">
                    <label for="inputContenido">Ingresa el Texto o URL:</label>
                    <input type="text" id="inputContenido" name="inputContenido" class="my-2 p-2 border-2 transition-colors border-blue-300 focus:border-blue-500 rounded-lg outline-0">
                    <label for="inputColor">Selecciona un Color (Opcional):</label>
                    <input type="color" id="inputColor" name="inputColor" class="w-16 h-10 my-2 cursor-pointer">
                    <label for="inputLogo">Selecciona un Logo (Opcional):</label>
                    <p class="text-xs text-gray-600 mb-2">Recomendado: PNG, 1:1</p>
                    <input type="file" accept="image/*" id="inputLogo" name="inputLogo" class="my-2">
                    <button class="bg-blue-500 hover:bg-blue-400 transition-colors text-neutral-100 font-semibold p-3 rounded-lg mt-2" >Generar QR</button>
                </form>
            </div>

            <div class="w-full my-2 md:m-0 md:w-8/12">
                <h2 class="font-semibold mb-4">2. Descarga tu nuevo Código</h2>
                <div class="bg-neutral-200 flex flex-col items-center p-4 rounded-lg w-full md:w-1/2" id="qrArea"></div>
                <a class="bg-blue-500 hover:bg-blue-400 transition-colors text-neutral-100 font-semibold p-3 rounded-lg" hidden id="btnDescargar">Descargar</a>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const inputContenido = document.getElementById('inputContenido');
        const inputColor = document.getElementById('inputColor');
        const inputLogo = document.getElementById('inputLogo');
        const formGenerarQR = document.getElementById('formGenerarQR');
        const qrArea = document.getElementById("qrArea");
        const btnDescargar = document.getElementById("btnDescargar");
        var qrcode;

        formGenerarQR.addEventListener('submit',(e)=>{
            e.preventDefault();
            qrArea.innerHTML = '';

            if(inputContenido.value == ''){
                alert('Por favor introduce una URL o un Texto');
            }else{
                if(inputLogo.files.length > 0){
                    let tipo = inputLogo.files[0].type;
                    tipo = tipo.substring(tipo.lastIndexOf('/') + 1);

                    if(tipo == 'png' || tipo == 'jpeg'){
                        let src = URL.createObjectURL(inputLogo.files[0]);
                        qrcode = new QRCode(qrArea, {
                            text: inputContenido.value,
                            logo: src,
                            logoWidth: undefined,
                            logoHeight: undefined,
                            logoBackgroundColor: '#ffffff',
                            logoBackgroundTransparent: true,
                            colorDark: inputColor.value,
                            colorLight: "#ffffff"
                        });
                    }else{
                        alert('Porfavor sube solo archivos PNG o JPG');
                    }
                }else{
                    qrcode = new QRCode(qrArea, {
                        text: inputContenido.value,
                        colorDark: inputColor.value,
                        colorLight: "#ffffff"
                    });
                }
            }

            setTimeout(() => {
                btnDescargar.href = qrcode._oDrawing.dataURL;
                btnDescargar.download = 'QR-InvirtualWeb.png';
                btnDescargar.hidden = (!qrArea.innerHTML == '') ? false : true;
            }, 200);
            
        });
    });
</script>
