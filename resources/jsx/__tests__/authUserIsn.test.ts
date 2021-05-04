import { authUserIsn } from "../authUserIsn";

let fakeISN: HTMLDivElement | any = null;
beforeAll(() => {
  fakeISN = document.createElement("div");
  fakeISN.id = "auth-user-isn";
  fakeISN.innerText = "5565";
  document.body.appendChild(fakeISN);
});

describe("authUserIsn", () => {
  it("Simple test", () => {
    expect(authUserIsn()).toBe("5565");
  });
  it("Simple test", () => {
    fakeISN.remove();

    expect(() => authUserIsn()).toThrow("Cannot read ISN");
  });
});

afterAll(() => {
  fakeISN.remove();
});
