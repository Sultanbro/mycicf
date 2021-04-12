import {axios, mock} from "./axios-mock";
import VueAxios from 'vue-axios';
import Centcoins from '../../resources/js/components/centcoins/centcoins.vue';
import {createLocalVue, shallowMount} from "@vue/test-utils";

describe('Centcoins', () => {
    let localVue;

    afterAll(() => {
        mock.restore();
    });

    beforeEach(() => {
        localVue = createLocalVue();
        localVue.use(VueAxios, axios);
        mock.reset();
        mock.onPost("/getCentcoins").reply(200, '1');
    });

    it('sample', (done) => {

        let wrapper = shallowMount(Centcoins, {
            localVue,
            data: () => ({}),
            propsData: {
                isn: 5565
            }
        });

        setTimeout(() => {
            expect(wrapper.find('.centcoins-value').text()).toBe('1');

            expect(mock.history.post.find(entry => entry.url === "/getCentcoins")).not.toBeNull();
            expect(JSON.parse(mock.history.post.find(entry => entry.url === "/getCentcoins").data).isn).toBe(5565);

            done()
        }, 2000);
    });

    it.skip('colleaguesMode test', (done) => {
        let wrapper = shallowMount(Centcoins, {
            localVue,
            data: () => ({}),
            propsData: {
                isn: 5565
            }
        });

        window.location.pathname = 'colleague';
        expect(wrapper.vm.colleaguesMode).toBeTruthy();

        window.location.pathname = '';
        expect(wrapper.vm.colleaguesMode).toBeFalsy();
    });
});
