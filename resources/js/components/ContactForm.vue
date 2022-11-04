<template>
  <div class="block justify-center p-6 rounded-lg shadow-lg bg-white max-w-md">
      <form  class="justify-center" @submit.prevent="saveContact()">
        <label for="form-group mb-6 text-gray-800" >{{title}}</label>
        <div class="form-group mb-6">
          <input type="text" 
            v-model="form.name"
            class="form-control block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="name"
            placeholder="Name">
        </div>
        <div class="form-group mb-6">
          <input type="text" 
            v-model="form.last_name"
            class="form-control block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="lastName"
            placeholder="Last Name">
        </div>
        <div class="form-group mb-6">
          <input type="text"
          v-model="form.phone"
          class="form-control block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="phone"
            placeholder="Phone Number">
        </div>
        <div class="form-group mb-6">
          <input type="email"
          v-model="form.email"
          class="form-control block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8"
            placeholder="Email address">
        </div>
        
        <button type="submit" class="
          w-full
          px-6
          py-2.5
          bg-blue-600
          text-white
          font-medium
          text-xs
          leading-tight
          uppercase
          rounded
          shadow-md
          hover:bg-blue-700 hover:shadow-lg
          focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
          active:bg-blue-800 active:shadow-lg
          transition
          duration-150
          ease-in-out">Send</button>
      </form>
    </div>    
</template>
<script>
import axios from "axios";

export default {
  
    data(){
        return {
            title: 'Contact Form',
            form: {
                name: null,
                last_name:null,
                email: null,
                phone: null
            }
        }
    },
    methods:{
        saveContact(){
          
        axios.post("/api/contact", {form: this.form})
          .then((response) => {
           
            alert('Contacto guardado Exitosamente');
            
          }).catch( (response) => {
            console.log(response.response.data.message);
          });
         
        }
    }



}
</script>