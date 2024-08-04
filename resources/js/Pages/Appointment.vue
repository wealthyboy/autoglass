<template>
    <header>
        <nav class="navbar navbar-expand-md fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img
                        alt="Porto"
                        width="220"
                        height="48"
                        data-sticky-width="82"
                        data-sticky-height="40"
                        data-sticky-top="84"
                        src="/images/logo/Autoglass_logo2.png"
                    />
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse"></div>
            </div>
        </nav>
    </header>

    <main class="mt-5">
        <div
            v-if="!isCompleted"
            class="d-flex justify-content-cente align-items-cente"
        >
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <!-- Timeline for larger screens -->
                    <div class="col-md-2 d-none d-md-block">
                        <ul class="nav flex-column timeline">
                            <li
                                class="nav-item timeline-step"
                                v-for="(step, index) in steps"
                                :key="index"
                                :class="{ active: currentStep === index }"
                            >
                                <a
                                    class="nav-link"
                                    @click="goToStep(index)"
                                    href="#"
                                >
                                    {{ step.title }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Form Steps -->
                    <div class="col-md-9">
                        <h2>Book your appointment in minutes</h2>

                        <div class="card">
                            <!-- Timeline for mobile screens -->
                            <div class="card-header d-md-none">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li
                                        class="nav-item"
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
            class="d-flex justify-content-center align-items-center border mt-4"
        >
            <div class="text-center">
                <h1>Thank You!</h1>
                <p>Your appointment has been booked successfully.</p>
            </div>
        </div>
    </main>
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
            { title: "Tell us about the damage", component: StepOne },
            { title: "Your replacement glass", component: StepTwo },
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
</style>
