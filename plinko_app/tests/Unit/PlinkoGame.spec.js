import { mount } from '@vue/test-utils';
import axios from 'axios';
import PlinkoGame from '@/Components/PlinkoGame.vue';

// Mock axios to simulate API calls
jest.mock('axios');

describe('PlinkoGame.vue', () => {
    let wrapper;

    beforeEach(() => {
       
        wrapper = mount(PlinkoGame, {
            data() {
                return {
                    balance: 1000,
                    betAmount: 10,
                    riskLevel: 'low',
                    payout: 0,
                    gameResult: null,
                };
            },
        });
    });


    it('rendereli a kezdő egyenleget helyesen', () => {
        expect(wrapper.text()).toContain('Egyenleg: 1000 Ft');
    });


    it('a tét összege módosítható', async () => {
        const input = wrapper.find('input[type="number"]');
        await input.setValue(50);
        expect(wrapper.vm.betAmount).toBe(50);
    });


    it('kockázati szint váltása helyesen működik', async () => {
        const select = wrapper.find('select');
        await select.setValue('medium');
        expect(wrapper.vm.riskLevel).toBe('medium');
    });


    it('figyelmeztet, ha a tét összege nulla', async () => {
        wrapper.vm.betAmount = 0;
        await wrapper.find('button').trigger('click');
        expect(window.alert).toHaveBeenCalledWith('A tétnek nagyobbnak kell lennie, mint 0!');
    });


    it('nem engedi a fogadást, ha nincs elég egyenleg', async () => {
        wrapper.vm.betAmount = 1100; // Több, mint az aktuális egyenleg
        await wrapper.find('button').trigger('click');
        expect(window.alert).toHaveBeenCalledWith('Nincs elég egyenleged a fogadáshoz!');
    });


    it('csökkenti az egyenleget a fogadás után', async () => {
        await wrapper.vm.startGame();
        expect(wrapper.vm.balance).toBe(990); // 1000 - 10
    });


    it('labdát ad hozzá a játékhoz a fogadás után', async () => {
        const addBallSpy = jest.spyOn(wrapper.vm, 'addBall');
        await wrapper.vm.startGame();
        expect(addBallSpy).toHaveBeenCalled();
    });


    it('frissíti a szorzókat a kockázati szint váltásakor', async () => {
        const initialMultipliers = wrapper.vm.multipliers;
        await wrapper.vm.updateMultipliers(['1x', '2x', '3x']);
        expect(wrapper.vm.multipliers).not.toBe(initialMultipliers);
    });


    it('helyesen számítja ki a nyereményt', () => {
        wrapper.vm.handleBallLanding({}, 5);
        expect(wrapper.vm.balance).toBe(1050); // 1000 + 10 * 5
    });


    it('nyeremény összege helyesen jelenik meg', async () => {
        wrapper.vm.payout = 200;
        await wrapper.vm.$nextTick();
        expect(wrapper.text()).toContain('Nyeremény: 200 Ft');
    });


    it('sikeresen hívja az API-t az egyenleg frissítésére', async () => {
        axios.post.mockResolvedValueOnce({ data: { balance: 1200 } });
        await wrapper.vm.updateBalanceOnServer(1200);
        expect(axios.post).toHaveBeenCalledWith('api/user/update-balance', { balance: 1200 });
    });


    it('betölti az egyenleget az API-ból', async () => {
        axios.get.mockResolvedValueOnce({ data: { user: { balance: 1500 } } });
        await wrapper.vm.mounted();
        expect(wrapper.vm.balance).toBe(1500);
    });
});
