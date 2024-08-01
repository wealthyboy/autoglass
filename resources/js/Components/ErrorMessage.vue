<template>
    <div v-if="index && errors && typeof errors[index] != 'undefined'">
        <p class="text-red-600 text-xs mb-3">{{ errors[index][0] }}</p>
    </div>
    <div v-if="message">
        <p class="text-red-600 text-xs mb-3 text-left">{{ message }}</p>
    </div>
</template>
<script>
export default {
    props: ["errors", "message", "index"],
};
</script>
