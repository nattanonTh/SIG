<template>
    <div>
        <uploaded-image v-for="uploadedImage in imageslist" v-bind:key="uploadedImage.name" :uploadedImage="uploadedImage" ></uploaded-image>
    </div>
</template>

<script>
export default {
    props: ['imageslist'],
    data() {
        return {};
    },
    methods: {
        updateImage() {
            this.test = true;
        }
    }
}
</script>
