<template>
    
<!-- ====== Table Section Start -->
<section class="bg-white py-20 lg:py-[120px]">
    <div class="container">
       <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
             <div class="max-w-full overflow-x-auto">
   
                <table class="table-auto w-full">
                   <thead>
                      <tr class="bg-primary text-center bg-indigo-500">
                         <th class=" font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 " >

                            {{name}}

                         </th>
                         <th class="w-1/6 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                            {{last_name}}
                         </th>
                         <th class="w-1/6 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                            {{phone}}
                         </th>
                         <th class=" w-1/6 min-w-[160px] text-lg  font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 ">
                            {{email}}
                         </th>
                         <th class=" w-1/6 min-w-[160px] text-lg  font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 ">
                            Options
                         </th>

                         
                      </tr>
                   </thead>
                   <tbody class="">
                      <tr v-for="contact in contacts" :key="contact.id" class="mx-auto">
                         <td
                            class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-l border-[#E8E8E8]">
                            {{contact.name}}
                         </td>
                         <td class="text-center text-dark font-medium  text-base py-5 px-2 bg-white border-b border-[#E8E8E8] ">
                            {{contact.last_name}}
                         </td>
                         <td class="  text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8] ">
                            {{contact.phone}}
                         </td>
                         <td  class=" text-center text-dark font-medium text-base py-5 px-2 bg-whiteborder-b border-[#E8E8E8]">
                            {{contact.email}}
                         </td>
                         <td class=" text-center text-dark font-medium text-base py-2 px-0 bg-white border-b border-r max-w-fit border-[#E8E8E8] ">
                            <Edit :contact_id="contact.id" @reloadContacts="showContacts"/>
                            <button 
                            
                            @click="deleteContact(contact.id)" 
                            @reloadContacts="showContacts"   
                            class=" border border-primary py-2 px-2 text-primary inline-block rounded hover:bg-primary hover:text-red-600 ">
                                Borrar
                            </button>
                           
                         </td>
                      </tr>
                      
                   </tbody>
                </table>
             </div>
          </div>
       </div>
    </div>
 </section>
 
 <!-- ====== Table Section End -->
</template> 
<script>
import Edit from "./Edit.vue";
import axios from "axios";
import {ref} from 'vue';

export default {
    data(){
        return {
            title: 'Contact Form',
            name: 'Nombre',
            last_name:'Apellido',
            phone: 'Telefono',
            email: 'Correo Electrónico',
            contacts:null,
        }
    },
    props:{
        contact_id: {
            type: Number,
            required: true
        }
    },
    components:{
        Edit
    },
    mounted(){
        this.showContacts();
    },
    methods:{ 
        showContacts(){
            axios.get("/api/contacts")
              .then((response) => {
                this.contacts = response.data;
              }).catch( (response) => {
                console.log(response.response.data.message);
              });
        },
        deleteContact(contact_id){
         
            console.log(contact_id);
            
            axios.delete(`/api/contacts/${contact_id}`)
              .then((response) => {
               console.log(response)        
              
                this.showContacts();
                alert('Contacto borado Exitosamente');
                this.$emit("reloadContacts")
              }).catch( (response) => {
                console.log(response);
              });
        }
    }
}

</script>
