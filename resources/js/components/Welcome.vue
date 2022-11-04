<template>
 
  
  <NavGroup />
  <ContactForm hidden/>
  <Show/>
 
  
</template>
<script  >
import ContactForm from './ContactForm.vue';
import NavGroup from './NavGroup.vue';
import Show from './Show.vue';
export default {
  components: { ContactForm, NavGroup, Show },
    data(){
        return {
            
        }
    },


}
</script>
