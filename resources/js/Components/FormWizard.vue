<template>
    <div class="max-w-3xl mx-auto p-4">
        <!-- Indicators -->
        <div class="flex justify-center mb-6">
            <div
                v-for="(step, index) in steps"
                :key="index"
                :class="[
                    'flex-1 text-center py-2 px-4 rounded-full',
                    currentStep === index
                        ? 'bg-blue-500 text-white'
                        : 'bg-gray-200 text-gray-700',
                ]"
            >
                {{ step }}
            </div>
        </div>

        <!-- Form Steps -->
        <div v-if="currentStep === 0" class="mb-6">
            <h2 class="text-xl font-bold mb-4">
                Step 1: Select Make, Model, and Year
            </h2>
            <div
                class="flex flex-col lg:flex-row lg:space-x-4 space-y-4 lg:space-y-0"
            >
                <div class="flex-1">
                    <label class="block mb-2">Make</label>
                    <select
                        v-model="formData.make"
                        class="w-full px-4 py-2 border rounded-md"
                    >
                        <option value="" disabled>Select Make</option>
                        <option v-for="make in makes" :key="make" :value="make">
                            {{ make }}
                        </option>
                    </select>
                </div>
                <div class="flex-1">
                    <label class="block mb-2">Model</label>
                    <select
                        v-model="formData.model"
                        class="w-full px-4 py-2 border rounded-md"
                    >
                        <option value="" disabled>Select Model</option>
                        <option
                            v-for="model in models"
                            :key="model"
                            :value="model"
                        >
                            {{ model }}
                        </option>
                    </select>
                </div>
                <div class="flex-1">
                    <label class="block mb-2">Year</label>
                    <select
                        v-model="formData.year"
                        class="w-full px-4 py-2 border rounded-md"
                    >
                        <option value="" disabled>Select Year</option>
                        <option v-for="year in years" :key="year" :value="year">
                            {{ year }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div v-if="currentStep === 1" class="mb-6">
            <h2 class="text-xl font-bold mb-4">Step 2</h2>
            <!-- Leave this step blank as per instruction -->
        </div>
        <div v-if="currentStep === 2" class="mb-6">
            <h2 class="text-xl font-bold mb-4">Step 3</h2>
            <!-- Leave this step blank as per instruction -->
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between">
            <button
                @click="prevStep"
                :disabled="currentStep === 0"
                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md"
            >
                Previous
            </button>
            <button
                @click="nextStep"
                :disabled="currentStep === steps.length - 1"
                class="px-4 py-2 bg-blue-500 text-white rounded-md"
            >
                Next
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentStep: 0,
            steps: ["Step 1", "Step 2", "Step 3"],
            makes: ["Make X", "Make Y", "Make Z"],
            models: ["Model A", "Model B", "Model C"],
            years: [2020, 2021, 2022, 2023],
            formData: {
                make: "",
                model: "",
                year: "",
            },
        };
    },
    methods: {
        nextStep() {
            if (this.currentStep < this.steps.length - 1) {
                this.currentStep++;
            }
        },
        prevStep() {
            if (this.currentStep > 0) {
                this.currentStep--;
            }
        },
    },
};
</script>

<style scoped>
/* Add any custom styles here */
</style>
