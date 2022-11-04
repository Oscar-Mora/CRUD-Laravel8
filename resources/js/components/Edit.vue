<template>

<button @click="showModal()" class=" border border-primary py-2 px-2 text-primary inline-block rounded hover:bg-primary hover:text-white ">Editar</button>

    <Modal :open="isOpen" @close="isOpen= !isOpen">
        
  <div class="block justify-center p-6 rounded-lg shadow-lg bg-white max-w-md">
      <form class="justify-center" @submit.prevent="updateContact()">
        <label for="form-group mb-6 text-gray-800"> Datos de Contacto </label>
        <div class="form-group mb-6">
          <input type="text" v-model="form.name"
            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-paddingborder border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="name"
            placeholder="Name">
        </div>
        <div class="form-group mb-6">
          <input type="text" 
            v-model="form.last_name"
            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition
            ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="lastName" placeholder="Last Name">
        </div>
        <div class="form-group mb-6">
          <input type="text"
          v-model="form.phone"
          class="form-control block w-fullpx-3py-1.5
            text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded
            transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="phone" placeholder="Phone Number">
        </div>
        <div class="form-group mb-6">
          <input type="email"
          v-model="form.email"
          class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="email" placeholder="Email address">
        </div>
        
        <button type="submit" @click="$emit('showContacts')" 
        class="w-full px-6
          py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
          Actualizar
        </button>
      </form>
    </div>    

    </Modal>
</template>
<script>
import Modal from './Modal.vue';
import {ref} from 'vue';
export default{
    props:{
        contact_id: {
            type: Number,
            required: true
        }
    },
    data(){
        return {
            title: 'Contact Form',
            form: {
                id:null,
                name: null,
                last_name:null,
                email: null,
                phone: null
            },
            isOpen: ref(false),
        }
    },
    components:{
        Modal, 
    },
    methods:{
        showModal(){
            this.isOpen = true;
            axios.get(`/api/get-contact/${this.contact_id}`)
              .then((response) => {
                 this.form.id = response.data.id;
                 this.form.name = response.data.name;
                 this.form.last_name = response.data.last_name;
                 this.form.phone = response.data.phone;
                 this.form.email = response.data.email;
              }).catch( (response) => {
                console.log(response.response.data.message);
              });
            },

       updateContact(){
        
            axios.put(`/api/update-contact/`,{contact: this.form})
              .then((response) => {
                //  alert('Cambios guardados Exitosamente');
                this.$emit("reloadContacts")
                 this.isOpen=false;
              }).catch( (response) => {
                console.log(response);
              });
            }
    }

}
</script>
