<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            location.href= '/admin'
        },
    });
};
</script>

<template>
<div class="bg-grey">

    <GuestLayout>

        <div v-if="status" class="mb-4 text-success">
            {{ status }}
        </div>
       <div class="container bg-grey">
           <div class="row">
            <div class="d-flex justify-content-center align-items-center vh-100">
            <form class="" @submit.prevent="submit">
                <div class="mb-3">
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="form-control mt-1"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mb-3">
                    <InputLabel for="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        class="form-control mt-1"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- <div class="mb-3 form-check">
                    <Checkbox id="remember" name="remember" class="form-check-input" v-model:checked="form.remember" />
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div> -->

                <div class="d-flex align-items-center justify-content-end">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-decoration-none text-muted"
                    >
                        Forgot your password?
                    </Link>

                    <PrimaryButton
                        class="btn btn-primary ms-4"
                        :class="{ 'disabled': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
            </form>
            </div>
           </div>
       </div>
      

     
    </GuestLayout>
    </div>

</template>
