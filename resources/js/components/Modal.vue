<template>
    <transition>
        <div class="vue-modal" v-show="open">
            <div class="vue-modal-inner">
                <div class="vue-modal-content">
                    <slot/>
                    <button type = "button" @click="$emit('close')">Close</button>

                </div>
            </div>
        </div>
    </transition>
</template>
<script>

export default{
    props:
    {
        open:{
            type:Boolean,
            required:true
        }
    }
}
</script>
<style>
.vue-modal{
    position: fixed;
    top:0;
    left:0;
    width:100%;
    height: 100%;
    overflow-x:hidden;
    overflow-y:auto;
    background-color:rgba(0,0,0,0.6);
    z-index:1;
}
.vue-modal-inner{
    max-width: 500px;
    margin: 2rem auto;
}
.vue-modal-content{
    position: relative;
    background-color: azure;
    border: 1px solid (0,0,0,0.3);
    background-clip: padding-box;
    border-radius:0.3 rem;
    padding: 1rem;
}
.fade-enter-active,
.fade-leave-active{
    transition:opacity 0.8s;
}  
.fade-enter,
.fade-leave-to{
    opacity:0;
}
.drop-in-enter-active,
.drop-in-leave-active{
    transition:all 0.3s ease-out;
}

</style>