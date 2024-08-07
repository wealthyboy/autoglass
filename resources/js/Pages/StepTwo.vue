<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#" class="text-color-dark font-weight-bold"
                        >Your car</a
                    >
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-color-dark font-weight-bold">{{
                        car
                    }}</a>
                </li>
            </ol>
        </nav>

        <h4 class="ne-selected font-weight-bold">
            <img src="/images/utils/tick-black-20.png" />
            Please tell us which window is damaged
        </h4>

        <div class="row">
            <!-- Parent Images -->
            <div class="d-flex">
                <div
                    class="mb-2 border-wizard me-2 text-center"
                    :class="{ 'border-active': isActiveParent(parent.id) }"
                    role="button"
                    v-for="(parent, index) in parentImages"
                    @click="toggleChildren(index, parent.id)"
                    :key="index"
                >
                    <div class="image-container">
                        <img
                            :src="parent.image"
                            :alt="parent.name"
                            class="img-fluid"
                        />
                    </div>
                    <span class="font-weight-bold text-center text-color-dark">
                        {{ parent.name }}
                    </span>
                </div>
            </div>

            <div class="mt-3" v-if="showChildren && childImages.length">
                <h4 class="ne-selected font-weight-bold">
                    <img src="/images/utils/tick-black-20.png" />
                    Identify type of damage
                </h4>
                <div class="d-flex">
                    <div
                        class="mb-2 border-wizard me-2 text-center"
                        v-for="(child, index) in childImages"
                        :key="index"
                        :class="{ 'border-active': isActiveChild(child.id) }"
                        role="button"
                        @click="childIsClicked(child.id)"
                    >
                        <div class="image-container text-center">
                            <img
                                :src="child.image"
                                v-if="child.image"
                                :alt="child.name"
                                class="img-fluid"
                            />
                        </div>
                        <span
                            class="font-weight-bold text-center text-color-dark"
                        >
                            {{ child.name }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="alert alert-info">
                NB: Only Front windshield is repairable, We can definitely
                REPLACE your damaged window at AFFORDABLE cost, Click NEXT to
                get a quote’
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref, onMounted } from "vue";

export default {
    name: "StepTwo",
    props: {
        categories: Array,
    },
    emits: ["can-proceed"],
    setup(props, { emit }) {
        const parentImages = ref(props.categories);
        const childImages = ref([]);
        const showChildren = ref(false);
        const activeParent = ref(null);
        const activeChild = ref(null);
        const car = ref("");
        const category_id = reactive({
            parent_id: null,
            child_id: null,
        });

        onMounted(() => {
            car.value = localStorage.getItem("car");
            const savedCat = localStorage.getItem("catState");

            if (savedCat) {
                Object.assign(category_id, JSON.parse(savedCat));
                childImages.value = getChildrenById(
                    parentImages.value,
                    category_id.parent_id
                );
                showChildren.value = true;
                emit("can-proceed", true);
            }
        });

        const isActiveParent = (ac) => {
            return ac === activeParent.value;
        };

        const isActiveChild = (id) => {
            return id === activeChild.value;
        };

        const childIsClicked = (id) => {
            category_id.child_id = id;
            activeChild.value = id;
            axios
                .post("/set-category", category_id)
                .then((res) => {
                    localStorage.setItem("parent", res.data.parent);
                    localStorage.setItem("child", res.data.child);
                    localStorage.setItem(
                        "catState",
                        JSON.stringify({
                            parent_id: category_id.parent_id,
                            child_id: id,
                        })
                    );

                    emit("can-proceed", true);
                })
                .catch((error) => {
                    console.log(error);
                });
        };

        function getChildrenById(arr, id) {
            const obj = arr.find((item) => item.id === id);
            return obj ? obj.children : [];
        }

        const toggleChildren = (index, id) => {
            activeParent.value = id;
            category_id.parent_id = id;
            childImages.value = parentImages.value[index].children;

            if (childImages.value.length) {
                showChildren.value = true;
                return;
            }

            axios
                .post("/set-category", category_id)
                .then((res) => {
                    localStorage.setItem("parent", res.data.parent);
                    localStorage.setItem(
                        "catState",
                        JSON.stringify({
                            parent_id: category_id.parent_id,
                        })
                    );

                    emit("can-proceed", true);
                })
                .catch((error) => {
                    console.log(error);
                });
        };

        return {
            parentImages,
            toggleChildren,
            childImages,
            showChildren,
            childIsClicked,
            car,
            isActiveParent,
            isActiveChild,
        };
    },
};
</script>

<style>
.image-container {
    cursor: pointer;
    text-align: center;
    margin-bottom: 10px; /* Reduce space between parent images */
}

.parent-image {
    border: 2px solid #007bff;
    padding: 5px;
}

.child-images {
    margin-top: 10px; /* Reduce space above child images */
}

.child-image {
    border: 1px solid #ddd;
    padding: 3px;
}

.border-wizard {
    border: 10px solid #dee2e6;
}

.border-active {
    border: 10px solid #008000 !important;
}

.border-wizard:hover {
    border: 10px solid #008000 !important;
}
</style>
