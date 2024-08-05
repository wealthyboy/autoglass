<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Your car</a></li>
                <li class="breadcrumb-item">
                    <a href="#">{{ car }}</a>
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
                    class="mb-2 border"
                    v-for="(parent, index) in parentImages"
                    :key="index"
                >
                    <div
                        @click="toggleChildren(index, parent.id)"
                        class="image-container"
                    >
                        <img
                            :src="parent.image"
                            v-if="parent.image"
                            :alt="parent.name"
                            class="img-fluid"
                        />
                    </div>
                    <span class="font-weight-bold">
                        {{ parent.name }}
                    </span>
                </div>
            </div>

            <div v-if="showChildren && childImages.length">
                <h4 class="ne-selected font-weight-bold">
                    <img src="/images/utils/tick-black-20.png" />
                    How many areas of damage are there?
                </h4>
                <div class="d-flex">
                    <div
                        class="mb-2 border"
                        v-for="(child, index) in childImages"
                        :key="index"
                    >
                        <div
                            @click="childIsClicked(child.id)"
                            class="image-container"
                        >
                            <img
                                :src="child.image"
                                v-if="child.image"
                                :alt="child.name"
                                class="img-fluid"
                            />
                        </div>
                        <span class="font-weight-bold">
                            {{ child.name }}
                        </span>
                    </div>
                </div>
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

        const childIsClicked = (id) => {
            category_id.child_id = id;
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
</style>
