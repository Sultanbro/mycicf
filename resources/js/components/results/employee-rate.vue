<template>
    <div>
        <div class="rating-list-container">
            <div class="rating-list">
                <div>
                    <div>
                        <span>Имя Фамилия</span>
                    </div>
                    <div>
                        <span><small>Подразделение</small></span>
                    </div>
                </div>
                <div>
                    <div class="text-center">
                        <div>Рейтинг</div>
                        <h4 class="employee-rating">A</h4>
                    </div>
                </div>
            </div>
            <div class="rating-list">
                <div>
                    <div>
                        <span>Имя Фамилия</span>
                    </div>
                    <div>
                        <span><small>Подразделение</small></span>
                    </div>
                </div>
                <div>
                    <div class="text-center">
                        <div>Рейтинг</div>
                        <h4 class="employee-rating">A</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "employee-rate"
    }
</script>

<style scoped>
    .rating-list-container:first-child {
        border-top: 1px solid #EEE;
    }
    .rating-list-container {
        border-bottom: 1px solid #EEE;
        border-top: 1px solid #EEE;
    }
    .rating-list-container:last-child {
        border: 0;
    }

    .rating-list {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 1rem;
        width: 100%;
    }

    .rating-list:first-child {
        border-top: 1px solid #EEE;
    }

    .rating-list:last-child {
        border: 0;
    }

    .employee-rating {
        color: cornflowerblue;
        font-weight: bold;
        padding: 0;
        margin: 0;
    }
</style>
