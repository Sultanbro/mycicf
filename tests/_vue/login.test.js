import {shallowMount, createLocalVue} from "@vue/test-utils";
import Login from '../../resources/js/components/registration/login.vue';
import FlashMessage from '@smartweb/vue-flash-message'

describe('login.vue', () => {
    let localVue;

    beforeEach(() => {
        localVue = createLocalVue();
        localVue.use(FlashMessage);
    })

    it('should be correct values', () => {
        const wrapper = shallowMount(Login, {
            localVue,
            data() {
                return {
                    username : 'Username',
                    password : '',
                };
            }
        });

        expect(wrapper.find('#username').element.value).toBe('Username');
        expect(wrapper.find('#username').attributes().placeholder).toBe('Логин');
    });

    it('should be correct values', () => {
        const wrapper = shallowMount(Login, {
            localVue,
            data() {
                return {
                    username : 'Username',
                    password : '',
                };
            }
        });

        expect(wrapper.find('#username').element.value).toBe('Username');
        expect(wrapper.find('#username').attributes().placeholder).toBe('Логин');
    });

    it('Validate function test', () => {
        const wrapper = shallowMount(Login, {
            localVue,
            data() {
                return {
                    username : '',
                    password : '',
                };
            }
        });

        expect(wrapper.vm.validate()).toBeFalsy();
    });

    it('Validate function test (must return true if fields are filled)', () => {
        const wrapper = shallowMount(Login, {
            localVue,
            data() {
                return {
                    username : 'Name',
                    password : 'pa$$w0rD',
                };
            }
        });

        expect(wrapper.vm.validate()).toBeTruthy();
    });

    it('Type value must be updated', () => {
        const wrapper = shallowMount(Login, {
            localVue,
            data() {
                return {
                    type: 1,
                    username : 'Name',
                    password : 'pa$$w0rD',
                };
            }
        });

        expect(wrapper.vm.type).toBe(1);
        wrapper.vm.checkType();
        expect(wrapper.vm.type).toBe(0);
    });

    it('Icon must be updated', () => {
        const wrapper = shallowMount(Login, {
            localVue,
            data() {
                return {
                    type: 1,
                    username : 'Name',
                    password : 'pa$$w0rD',
                };
            }
        });

        expect(wrapper.vm.className).toBe('fa fa-eye');
        wrapper.vm.type = 0;
        wrapper.vm.changeIcon();
        expect(wrapper.vm.className).toBe('fa fa-eye-slash');
    });

    it('Preloader must be updated', () => {
        let preloader = document.createElement('div');
        preloader.id = 'preloader';
        preloader.style.display = 'none';
        document.body.append(preloader);

        const wrapper = shallowMount(Login, {
            localVue,
            data() {
                return {
                    username : 'Name',
                    password : 'pa$$w0rD',
                };
            }
        });

        expect(preloader.style.display).toBe('none');
        wrapper.vm.preloader(true);
        expect(preloader.style.display).toBe('flex');
        wrapper.vm.preloader(false);
        expect(preloader.style.display).toBe('none');
    });
});
