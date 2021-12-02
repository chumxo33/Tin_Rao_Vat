<template>
    <div>
        <input type="file" ref="input" class="hidden" @change="fileChange">
        <img ref="previewImg" style="max-width:250px"/>
        <button class="btn btn-default border" @click.prevent="openFileSelect">Select Image</button>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    methods: {
        openFileSelect(){
             this.$refs.input.click();
        },
        fileChange(){
            let file = this.$refs.input.files[0];   // Lập về 1 mảng cái input file ảnh
            //Tạo object URL của file và đặt src vào  <img ref="previewImg">
            this.$refs.previewImg.src = URL.createObjectURL(file);
        }
    }
}
</script>
<style scoped>
.hidden{
    display: none;
}
</style>