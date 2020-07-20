<template>
    <li class="nav-item">
      <a class="nav-link" href="/cart">
        Carrito  
      <span class="pl-2"></span>
      </a>
    </li>
</template>
<script>
export default {
    data() {
        return {
            products: [],
        }
    },
    created() {
        this.getData()
    },
    methods: {
        async getData() {
            const response = await fetch('http://localhost:8020/aletoys/public/cart/records')
            const data = await response.json()      
            var all_departments = data
            console.log(data)
        }
    },
}
</script>