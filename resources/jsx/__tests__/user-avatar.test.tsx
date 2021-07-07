import "../__mocks__/match-media";
import "jest-extended";
import React from "react";
import { act } from "react-dom/test-utils";
import { render } from "react-dom";
import { UserAvatar } from "../components/UserAvatar";

let container: HTMLDivElement | any = null;

beforeEach(() => {
  // подготавливаем DOM-элемент, куда будем рендерить
  container = document.createElement("div");
  document.body.appendChild(container);
});

describe("user avatar test", () => {
  xit("Simple avatar test", () => {
    expect(container).not.toBeNull();
    act(() => {
      render(<UserAvatar isn="123456" />, container);
    });
    let img = container.querySelector("span img");
    expect(img).not.toBeNull();
    expect(img.src).toEndWith("/storage/images/employee/123456.png");
  });
});
