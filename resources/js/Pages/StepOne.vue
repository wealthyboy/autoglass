<template>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <h3 class="ne-desktop">
                    <span class="fw-700 font-weight-bold text-2 text-black"
                        >Select your car</span
                    >
                </h3>
            </div>
            <!-- Year Select -->
            <div class="col-12 col-md-3 mb-3 mb-md-0">
                <div class="select-custom">
                    <select
                        name="year"
                        class="form-select"
                        v-model="form.year"
                        data-next="makes"
                        @change="getNext($event)"
                    >
                        <option value="0" selected="selected">Year</option>
                        <option v-for="year in years" :key="year" :value="year">
                            {{ year }}
                        </option>
                    </select>
                </div>
            </div>
            <!-- Make Select -->
            <div class="col-12 col-md-3 mb-3 mb-md-0">
                <div class="select-custom">
                    <select
                        class="form-select"
                        @change="getNext($event)"
                        name="make"
                        data-next="models"
                        v-model="form.make_id"
                    >
                        <option selected value="0">Make</option>
                        <option
                            v-for="make in makes"
                            :key="make.id"
                            :value="make.id"
                        >
                            {{ make.name }}
                        </option>
                    </select>
                </div>
            </div>

            <!-- Model Select -->
            <div class="col-12 col-md-3 mb-3 mb-md-0">
                <div class="select-custom">
                    <select
                        class="form-select"
                        name="model"
                        @change="getNext($event)"
                        v-model="form.model_id"
                        data-next="step-two"
                    >
                        <option value="">Model</option>
                        <option
                            v-for="model in models"
                            :key="model.id"
                            :value="model.id"
                        >
                            {{ model.name }}
                        </option>
                    </select>
                </div>
            </div>
            <!-- Check Button -->
            <div class="col-12 col-md-3">
                <button
                    class="btn btn-primary w-100"
                    :disabled="!isStepTwo"
                    @click="checkData"
                >
                    <span
                        v-if="loading"
                        class="spinner-border spinner-border-sm me-2"
                        aria-hidden="true"
                    ></span>
                    <span role="status">Check</span>
                </button>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <div class="">
                <p v-if="message" class="mb-1 mb-md-0 d-flex">
                    <img
                        class="ne-desktop"
                        width="25"
                        height="25"
                        src="/images/utils/tick-25.png"
                    />
                    <span class="fw-600 fw-md-700 text-black bold">
                        <strong class="text-color-dark font-weight-bold">
                            Good news!
                        </strong>
                    </span>
                    <span class="mx-1"> We should be able to fix your </span>
                </p>
                <div class="col-12 mx-2">
                    {{ message }}
                </div>

                <div v-if="message" class="mx-2">
                    Please click <span class="bold">Next</span> to continue
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex">
                <img
                    class="help-info"
                    src="/images/utils/info-30.png"
                    alt="helpinfo"
                    width="20"
                    height="20"
                />
                <div class="ne-help-panel-content">
                    <h4 class="font-weight-bold text-4 ml-2">
                        Why are we asking?
                    </h4>
                    <p>
                        We use your registration to identify the exact make and
                        model of your vehicle – nothing else, you are in safe
                        hands.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref, onMounted } from "vue";
import axios from "axios";

export default {
    props: ["filter"],
    emits: ["can-proceed"],
    setup(props, { emit }) {
        const makes = ref([]);
        const models = ref([]);
        const years = ref([]);
        const isStepTwo = ref(false);
        const message = ref("");
        const loading = ref(false);

        const next = reactive({
            makes: [],
            models: "",
        });

        const form = reactive({
            year: "0",
            make_id: "0",
            model_id: "",
            type: "",
            next: "",
        });

        onMounted(() => {
            let savedMakes = localStorage.getItem("makes");
            let savedModels = localStorage.getItem("models");
            const savedForm = localStorage.getItem("formState");

            if (savedForm) {
                isStepTwo.value = true;
                Object.assign(form, JSON.parse(savedForm));
                emit("can-proceed", true);
            }

            if (savedMakes) {
                makes.value = JSON.parse(savedMakes);
            }

            if (savedModels) {
                models.value = JSON.parse(savedModels);
            }

            axios
                .get("/api/years")
                .then((response) => {
                    years.value = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        });

        function getNext(e) {
            form.type = e.target.name;
            let nt = e.target.dataset.next;
            axios
                .get("/make-model-year", { params: form })
                .then((response) => {
                    if (nt === "makes") {
                        makes.value = response.data.data;
                        localStorage.setItem(
                            "makes",
                            JSON.stringify(response.data.data)
                        );
                        form.model_id = "";
                    }

                    if (nt === "models") {
                        models.value = response.data.data;
                        localStorage.setItem(
                            "models",
                            JSON.stringify(response.data.data)
                        );
                    }

                    next[nt] = response.data.data;
                    if (nt === "step-two") {
                        isStepTwo.value = true;
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        }

        function checkData() {
            loading.value = true;
            axios
                .post("/api/save-selection", {
                    year: form.year,
                    make_id: form.make_id,
                    model_id: form.model_id,
                })
                .then((res) => {
                    message.value = res.data.message;
                    localStorage.setItem(
                        "formState",
                        JSON.stringify({
                            year: form.year,
                            make_id: form.make_id,
                            model_id: form.model_id,
                        })
                    );
                    localStorage.setItem("car", res.data.car);
                    emit("can-proceed", true);
                    loading.value = false;
                })
                .catch((error) => {
                    alert("Something went wrong");
                    loading.value = false;
                });
        }

        return {
            getNext,
            makes,
            models,
            form,
            next,
            years,
            isStepTwo,
            checkData,
            message,
            loading,
        };
    },
};
</script>

<style scoped>
.select-custom {
    width: 100%;
}
</style>
