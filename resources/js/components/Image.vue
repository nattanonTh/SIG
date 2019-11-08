<template>
    <div>
       <img class="iamge" :src="path" :alt="name">
    </div>
</template>

<script>
export default {
    props: ['uploadedImage'],
    data() {
        return {
            'path' : this.uploadedImage.path,
            'name' : this.uploadedImage.name,
            'size' : this.uploadedImage.size,
            'id' : this.uploadedImage.id,
        };
    }
}
</script>

<style scoped>
    img.image {
        max-width: 300px;
    }
</style>
