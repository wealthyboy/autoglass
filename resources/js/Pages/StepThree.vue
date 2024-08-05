<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="font-weight-bold text-color-dark" href="#"
                        >Your car</a
                    >
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="font-weight-bold text-color-dark">{{
                        car
                    }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="font-weight-bold text-color-dark">{{
                        parent
                    }}</a>
                </li>

                <li
                    class="breadcrumb-item active font-weight-bold text-color-dark"
                    aria-current="page"
                >
                    {{ child }}
                </li>
            </ol>
        </nav>
        <h3 class="text-color-dark font-weight-bold">Step 3: Your details</h3>
        <p>Please complete the fields below and we will call you shortly</p>
        <form @submit.prevent="submitForm">
            <!-- Form Fields -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <general-input
                        id="first_name"
                        :error="v$.first_name"
                        v-model="form.first_name"
                        name="First Name"
                        type="text"
                    />
                </div>
                <div class="col-md-6">
                    <general-input
                        id="last_name"
                        :error="v$.last_name"
                        v-model="form.last_name"
                        name="Last Name"
                        type="text"
                    />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <general-input
                        id="phone_number"
                        :error="v$.phone_number"
                        v-model="form.phone_number"
                        name="Phone Number"
                        type="tel"
                    />
                </div>
                <div class="col-md-4">
                    <general-input
                        id="email"
                        :error="v$.email"
                        v-model="form.email"
                        name="Email"
                        type="email"
                    />
                </div>

                <div class="col-12 col-md-4 mt-4">
                    <div class="">
                        <select class="form-select">
                            <option selected value="0">Choose State</option>
                            <option>Lagos</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="text-color-dark font-weight-bold" for="">
                    Anything you would like to tell us</label
                >
                <textarea
                    id="note"
                    :error="v$.note"
                    v-model="form.note"
                    name="Note"
                    class="form-control"
                    placeholder="Comment"
                    type="textarea"
                    rows="3"
                ></textarea>
            </div>

            <button class="btn btn-primary w-100" type="submit">
                <span
                    v-if="loading"
                    class="spinner-border spinner-border-sm me-2"
                    aria-hidden="true"
                ></span>
                <span role="status">Submit</span>
            </button>
        </form>
    </div>
</template>
<script>
import { ref, reactive, onMounted } from "vue";
import { useVuelidate } from "@vuelidate/core";
import { required, email, maxLength } from "@vuelidate/validators";
import GeneralInput from "../Components/Input.vue";

import axios from "axios";

export default {
    name: "StepThree",
    components: {
        GeneralInput,
    },
    emits: ["completed"],
    setup(props, { emit }) {
        const parent = ref("");
        const child = ref("");
        const car = ref("");

        const loading = ref(false);

        const form = reactive({
            first_name: "",
            last_name: "",
            phone_number: "",
            email: "",
            address_line1: "",
            address_line2: "",
            city: "",
            state: "",
            postal_code: "",
            note: "",
        });

        onMounted(() => {
            car.value = localStorage.getItem("car");

            parent.value = localStorage.getItem("parent");
            child.value = localStorage.getItem("child");
        });

        const rules = {
            first_name: { required, maxLength: maxLength(255) },
            last_name: { required, maxLength: maxLength(255) },
            phone_number: { required, maxLength: maxLength(20) },
            email: { required, email, maxLength: maxLength(255) },
        };

        const v$ = useVuelidate(rules, form);

        function submitForm() {
            this.v$.$validate();

            if (this.v$.$error) {
                return;
            }
            loading.value = true;
            axios
                .post("/appointment/store", form)
                .then((response) => {
                    loading.value = false;
                    emit("completed");
                })
                .catch((error) => {
                    loading.value = false;
                    alert("An error occurred. Please try again.");
                });
        }

        return {
            child,
            parent,
            car,
            form,
            v$,
            submitForm,
            loading,
        };
    },
};
</script>
