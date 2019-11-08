require('./bootstrap');
import ImageGallery from './imagegallery';
window.Vue = require('vue');

Vue.component('dropzone', require('./components/DropZone').default);
Vue.component('image-gallery', require('./components/ImageGallery').default);
Vue.component('uploaded-image', require('./components/Image').default);


let imagesList = [];

if (defaultImage) {
    defaultImage.forEach(element => {
        imagesList.push(new ImageGallery(element))
    });
}

let app = new Vue({
    el: '#gallery',
    data: {
        'imagesList': imagesList
    }
});
