<template>
    <label
        class="text-color-dark font-weight-bold"
        :for="$attrs.id"
        v-if="$attrs.name"
    >
        {{ $attrs.name }}
    </label>
    <input
        :class="[
            typeof error !== 'undefined' && error && error.$error
                ? 'is-invalid'
                : '',
        ]"
        type="text"
        autocomplete="on"
        class="form-control"
        :value="modelValue"
        v-bind="$attrs"
        @input="$emit('update:modelValue', $event.target.value)"
    />

    <div class="mt-1"></div>
</template>

<script>
export default {
    props: ["error", "modelValue", "server_errors"],
    emits: ["update:modelValue"],
};
</script>
