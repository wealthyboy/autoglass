<template>
    <div class="bg-light bg-grey mb-5">
        <div
            v-if="!isCompleted"
            class="d-flex justify-content-cente align-items-cente"
            
        >
            <div class="container mt-3 mb-3">
                <div class="row justify-content-center">
                    <!-- Timeline for larger screens -->
                    <div class="col-md-2 d-none d-md-block mt-5">
                        <ul class="nav flex-column timeline">
                            <li
                                class="nav-item timeline-step border bg-light"
                                v-for="(step, index) in steps"
                                :key="index"
                                :class="{ active: currentStep === index }"
                            >
                                <a class="nav-link" href="#">
                                    {{ step.title }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Form Steps -->
                    <div class="col-md-9">
                        <h2 class="font-weight-bold text-black">Get a quote</h2>

                        <div class="card">
                            <!-- Timeline for mobile screens -->
                            <div class="card-header d-md-none">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li
                                        class="nav-item border"
                                        v-for="(step, index) in steps"
                                        :key="index"
                                    >
                                        <a
                                            :class="[
                                                'nav-link',
                                                {
                                                    active:
                                                        currentStep === index,
                                                },
                                            ]"
                                            @click="goToStep(index)"
                                            href="#"
                                        >
                                            {{ step.title }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <!-- Dynamic component rendering -->
                                <component
                                    @completed="completed"
                                    :categories="categories"
                                    @can-proceed="handleCanProceed"
                                    :is="steps[currentStep].component"
                                ></component>
                            </div>
                            <div
                                class="card-footer d-flex justify-content-between"
                            >
                                <button
                                    class="btn btn-secondary"
                                    @click="prevStep"
                                    :disabled="currentStep === 0"
                                >
                                    Previous <i class="bi bi-facebook"></i>
                                </button>
                                <button
                                    class="btn btn-primary"
                                    @click="nextStep"
                                    :disabled="
                                        currentStep === steps.length - 1 ||
                                        !next
                                    "
                                >
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            v-if="isCompleted"
            class="container full-height d-flex justify-content-center align-items-center"
        >
            <div class="text-center">
                <h1>Thank You!</h1>
                <p>One of our glass experts will contact you..</p>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import StepOne from "./StepOne.vue";
import StepTwo from "./StepTwo.vue";
import StepThree from "./StepThree.vue";

export default {
    props: {
        categories: Array,
    },
    setup() {
        const currentStep = ref(0);
        const next = ref(false);
        const isCompleted = ref(false);

        const steps = [
            { title: "Select your vehicle", component: StepOne },
            { title: "Tell us about the damage", component: StepTwo },
            { title: "Your details", component: StepThree },
        ];

        const goToStep = (index) => {
            currentStep.value = index;
        };

        const handleCanProceed = () => {
            next.value = true;
        };

        const nextStep = () => {
            if (currentStep.value < steps.length - 1) {
                currentStep.value++;
            }

            next.value = false;
        };

        const completed = () => {
            isCompleted.value = true;
            localStorage.clear();
        };

        const prevStep = () => {
            if (currentStep.value > 0) {
                currentStep.value--;
            }
        };

        return {
            currentStep,
            steps,
            goToStep,
            nextStep,
            prevStep,
            next,
            handleCanProceed,
            isCompleted,
            completed,
        };
    },
};
</script>

<style>
.nav-link.active {
    font-weight: bold;
}
li.nav-item.timeline-step.border.bg-light.active a {
    color: #ffffff !important;
}
.timeline {
    position: relative;
    padding-left: 20px;
}
.timeline-step {
    position: relative;
}
.timeline-step.active {
    background-color: #008000 !important;
    color: #fff !important;
}
.timeline-step.active::after {
    content: "";
    position: absolute;
    right: -30px; /* Extend further to the right */
    top: 50%;
    transform: translateY(-50%);
    border-width: 15px; /* Increase the size of the arrow */
    border-style: solid;
    border-color: transparent transparent transparent #008000;
}

.full-height {
    height: 40vh; /* Full viewport height */
}
</style>
