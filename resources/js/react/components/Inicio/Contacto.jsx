import { useContext } from "react";
import Text from "../Text";
import {
    FaFacebookF,
    FaInstagram,
    FaSpotify,
    FaTripadvisor,
} from "react-icons/fa";
import AppContext from "../../Context/AppContext";
import { useTranslation } from "react-i18next";
import FadeInUpDiv from "../FadeInUp";
import { Link } from "react-router-dom";

function formatPhoneNumber(phoneNumber) {
    phoneNumber = phoneNumber.toString();
    if (phoneNumber.length !== 10) {
        return phoneNumber;
    }
    return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3, 6)} ${phoneNumber.slice(6, 10)}`;
}

export default function Contacto() {
    const { state } = useContext(AppContext);
    const { t, i18n } = useTranslation();

    return (
        <section className="px-7 pb-10 pt-20 lg:px-10 lg:py-28" id="contacto">
            <FadeInUpDiv>
                <div className="flex flex-row flex-wrap justify-between md:mb-20 md:items-center xl:mb-36">
                    <figure className="w-full md:w-auto">
                        <img
                            src="/img/horno.svg"
                            alt="Horno"
                            className="mx-auto mb-4 w-[116px] md:w-[160px] lg:w-[200px] xl:w-[260px] 2xl:w-[380px]"
                        />
                    </figure>
                    <div className="w-full md:w-auto md:text-left">
                        <Text.Title
                            className={"mb-4 md:text-left"}
                            parseHtml={true}
                        >
                            {state.website[i18n.language].home_s5_title}
                        </Text.Title>

                        <div className="mb-10 flex items-center justify-center gap-5 md:justify-start">
                            {state.website.url_in && (
                                <a
                                    href={state.website.url_in}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <FaInstagram className="text-base lg:text-2xl" />
                                </a>
                            )}
                            {state.website.url_fb && (
                                <a
                                    href={state.website.url_fb}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <FaFacebookF className="text-base lg:text-2xl" />
                                </a>
                            )}
                            {state.website.url_ta && (
                                <a
                                    href={state.website.url_ta}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <FaTripadvisor className="text-base lg:text-2xl" />
                                </a>
                            )}
                            {state.website.url_sp && (
                                <a
                                    href={state.website.url_sp}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <FaSpotify className="text-base lg:text-2xl" />
                                </a>
                            )}
                        </div>
                    </div>
                    <figure className="hidden w-full md:w-auto lg:inline">
                        <img
                            src="img/sello-p.svg"
                            alt="Sello p"
                            className="mx-auto mb-10 size-[127px] xl:size-[165px]"
                        />
                    </figure>
                </div>
            </FadeInUpDiv>

            <div className="mx-auto flex flex-row flex-wrap text-center xl:max-w-none xl:justify-between xl:text-left">
                {state?.sucursals.length > 0 && (
                    <FadeInUpDiv className={"mb-10 w-full md:w-1/2 xl:w-auto"}>
                        <Text.Subtitle
                            className={
                                "mb-1 text-center text-xl leading-5 tracking-[2px] underline xl:text-left"
                            }
                        >
                            {t("contacto")}
                        </Text.Subtitle>

                        {state.sucursals.map((item) => {
                            if (item.phone)
                                return (
                                    <Text key={"sucursal-phone-" + item.slug}>
                                        {item.title} -{" "}
                                        <a
                                            className="underline"
                                            href={"tel:+52" + item.phone}
                                        >
                                            {formatPhoneNumber(item.phone)}
                                        </a>
                                    </Text>
                                );
                        })}
                    </FadeInUpDiv>
                )}

                <FadeInUpDiv className={"mb-10 w-full md:w-1/2 xl:w-auto"}>
                    <Text.Subtitle
                        className={
                            "mb-1 text-center text-xl leading-5 tracking-[2px] underline xl:text-left"
                        }
                    >
                        {t("facturacion")}
                    </Text.Subtitle>
                    {state.sucursals.map((item) => {
                        if (item.urlfacturacion)
                            return (
                                <a
                                    key={"sucursal-link-" + item.slug}
                                    href={item.urlfacturacion}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <Text className={"underline"}>
                                        {item.title}
                                    </Text>
                                </a>
                            );
                    })}
                    <Text className={"underline"}>
                        <a href={"mailto:" + state.website.email_facturacion}>
                            {state.website.email_facturacion}
                        </a>
                    </Text>
                </FadeInUpDiv>

                <FadeInUpDiv className={"mb-10 w-full md:w-1/2 xl:w-auto"}>
                    <Text.Subtitle
                        className={
                            "mb-1 text-center text-xl leading-5 tracking-[2px] underline xl:text-left"
                        }
                    >
                        {t("bolsa")}
                    </Text.Subtitle>
                    <Link to={"bolsa-de-trabajo"}>
                        <Text className={"underline"}>{t("formContact")}</Text>
                    </Link>
                    <a href={"mailto:" + state.website.email_bolsa}>
                        <Text className={"underline"}>
                            {state.website.email_bolsa}
                        </Text>
                    </a>
                </FadeInUpDiv>

                <FadeInUpDiv className={"mb-10 w-full md:w-1/2 xl:w-auto"}>
                    <Text.Subtitle
                        className={
                            "mb-1 text-center text-xl leading-5 tracking-[2px] underline xl:text-left"
                        }
                    >
                        {t("gruposEventos")}
                    </Text.Subtitle>
                    <Link to={"eventos"}>
                        <Text className={"underline"}>{t("formContact")}</Text>
                    </Link>
                    <a href={"mailto:" + state.website.email_eventos}>
                        <Text className={"underline"}>
                            {state.website.email_eventos}
                        </Text>
                    </a>
                </FadeInUpDiv>
            </div>
        </section>
    );
}
