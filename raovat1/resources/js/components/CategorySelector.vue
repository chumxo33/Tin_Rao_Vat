<template>
    <div class="form-group">
      <span class="categoryList">
        <!-- Để hiện ra selectedCategories  -->
          <span 
            class="categoryItem" 
            v-for="category in selectedCategories" 
            :key="category.id">
              {{ category.name }}
              <span @click="selectedCategories.splice(index, 1)"> X </span>
          </span>
      </span>

        <div class="dropdown" style="display: inline-block">
            <button 
            class="btn btn-secondary dropdown-toggle" 
            type="button" 
            id="dropdownMenuButton" 
            data-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="false"
            >
              Vui Lòng Chọn:
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <input type="text" class="form-control" v-model="keyword" v-on:input="debounceInput">
               <!-- Trả hết vào categories dòng 52 thì dùng vòng lặp để hiển thị ra -->
               <!-- Khi mà selectedCategories dòng 55 đã chọn thì hiện lên -->
               <a 
                  v-for="category in categories" 
                  :key="category.id" 
                  class="dropdown-item" 
                  href="#"
                  @click.prevent="selectedCategories.push(category)"  
                  >{{ category.name }}</a>
            </div>
        </div>
    <!-- Khi chúng ta submit form thì đặt 1 đóng dữ liệu ngầm để submit -->
    <!-- Chúng ta sẽ gửi dữ liệu ngầm bằng Mảng name="category_ids[]" để truyển qua bên store/UserArticleController.php  -->
        <input 
            type="hidden" 
            name="category_ids[]" 
            v-for="category in selectedCategories" 
            :key="category.id" 
            :value="category.id"
        />
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data(){
      return {
        // Đẻ chứa từ khóa tìm kiếm // Dòng 25: khi gõ v-model thì keyword thay đổ 
        keyword: '', 
        categories: [],
        selectedCategories: [],  // Các category đã chọn
        
      }
    },
    methods: {
      getCategories(){
        // http://localhost:8000/resource/categories?keyword=....
        axios.get("/resource/categories?keyword="+this.keyword ).then(response => {
          this.categories = response.data; //Chứa hết tất cả categories->khi trả về dòng 53
        })
      },
      // Khi mình gõ vào category thì keyword thay đổi nhưng chưa gọi lên
      // Cứ mỗi lần gõ category thì debounce chúng trong vòng 1. Nếu thả ra trong 1s nó sẽ gọi lên
      // Chúng ta sử dụng lodash trong <input v-on:input="debounceInput"> dòng 25
      debounceInput: _.debounce(function () { 
      this.getCategories();
      }, 500)      
    },
}

</script>
<style scoped>
/* style categoryItem dòng 5 */
.categoryItem {
  border: 1px solid black;
  border-radius: 3px;
  padding: 5px 10px;
}
</style>