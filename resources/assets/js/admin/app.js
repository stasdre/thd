
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('jquery-ui');
    require('bootstrap');
    require('admin-lte');
    require('select2');
    require('jquery-ui/ui/widgets/sortable');
    require('jquery-ui/ui/widgets/datepicker');
    require('jquery-ui/ui/widgets/autocomplete');
} catch (e) {}


const token = document.head.querySelector('meta[name="csrf-token"]');

$(".thd-alerts-messages").fadeTo(3000, 500).slideUp(500, function(){
    $(".thd-alerts-messages").slideUp(500);
});

$(function(){
    $(".delete-file").on('click', function(e){
        e.preventDefault();
        $(this).parent().parent().find("input[type='file']").removeClass('hidden');
        $(this).parent().hide();
    });
});

const infoBlock = document.createElement('div');
infoBlock.classList.add('doka-info')

const doka = Doka.create();
// doka.setOptions({
//     cropMask: (root, setInnerHTML) => {

//         setInnerHTML(root, `
//         <mask id="my-mask">
//             <rect x="0" y="0" width="100%" height="100%" fill="white"/>
//             <rect fill="black"/>
//         </mask>
//         <rect fill="rgba(255,255,255,.3125)" x="0" y="0" width="100%" height="100%" mask="url(#my-mask)"/>
//         <rect fill="transparent" stroke-width="1" stroke="rgba(255,255,255,.85)"/>
//     `);        
//         // Select the mask element (area that is still visible)
//         const bleedMask = root.querySelector('mask rect[fill="black"]');

//         // Select the edge element (one pixel white line)
//         const bleedEdge = root.querySelector('rect[fill="transparent"]');

//         return (rect) => {
//             // update the mask positions
//             bleedMask.setAttribute('x', rect.x);
//             bleedMask.setAttribute('y', rect.y);
//             bleedMask.setAttribute('width', rect.width);
//             bleedMask.setAttribute('height', rect.height);
//             setInfo(rect);

//             // update the edge positions, notice the .5s, this is to render sharp 1 pixel wide lines
//             bleedEdge.setAttribute('x', Math.round(rect.x) - .5);
//             bleedEdge.setAttribute('y', Math.round(rect.y) - .5);
//             bleedEdge.setAttribute('width', rect.width + .5);
//             bleedEdge.setAttribute('height', rect.height + .5);
//         }        
//     }
// });
doka.on('load', (output) => {
    // const dokaRoot = document.querySelector('.doka--root');
    // if(!document.querySelector('.doka-info')){
    //     dokaRoot.append(infoBlock);    
    // }    
});
document.querySelector('body').addEventListener('click', e=>{
    if(e.target.classList.contains('edit-img')){
        e.preventDefault();

        const elem = e.target;
        const img = elem.querySelector('img');
        const imgUrl = img.getAttribute('src');
        
        doka.edit(imgUrl).then(output => {

            let formData = new FormData();
            formData.append("image", output.file);
            formData.append("src", imgUrl);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", '/admin-thd/upload-image/', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', token.getAttribute('content'));
            xhr.send(formData);

            xhr.addEventListener('load', ()=>{
                if(xhr.status == 200){
                    let data = JSON.parse(xhr.responseText);
                    if(data.success == 'ok'){
                        img.setAttribute('src', imgUrl+'?rnd='+Math.random());
                    }
                }
            });
        });        
    }
});

function setInfo(info)
{
    infoBlock.innerText = 'Size: '+Number((info.width).toFixed(2))+'px x '+Number((info.height).toFixed(2))+'px';
}