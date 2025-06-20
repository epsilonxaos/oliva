import { FaFacebookF, FaInstagram } from "react-icons/fa";
import Text from "../components/Text";
import Button from "../components/Button";
import { useEffect, useState } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";
import { _PATH_SOURCES } from "../utils/const";
import { useTranslation } from "react-i18next";
import FadeInUpDiv from "../components/FadeInUp";
import parse from "html-react-parser";

export default function SucursalDetalle() {
    const [data, setData] = useState({});
    const { t, i18n } = useTranslation();

    let { slug } = useParams();

    useEffect(() => {
        async function fetchData() {
            const response = await axios.get(
                import.meta.env.VITE_APP_URL + "api/sucursal/" + slug,
            );

            console.log({ response });
            if (response.status == 200) setData(response.data);
            else console.log("redirect");
        }
        fetchData();
    }, [slug]);

    return (
        <section className="flex  max-w-[1920px] flex-row flex-wrap text-white">
            <figure className="mb-12 size-full overflow-hidden lg:sticky lg:top-[74px] lg:mb-0 lg:h-[calc(100dvh-74px)] lg:w-1/2">
                <img
                    src={_PATH_SOURCES + data.cover}
                    alt={data.title}
                    className="size-full min-h-[400px] object-cover object-center md:min-h-[550px] lg:min-h-[730px]"
                />
            </figure>
            <article className="w-full px-7 py-10 text-center lg:w-1/2 lg:py-20">
                <header className="mx-auto max-w-[590px]">
                    <FadeInUpDiv>
                        <Text.Title className={"mb-8"}>
                            Sucursal {data.title}
                        </Text.Title>
                    </FadeInUpDiv>
                </header>
                <main className="mx-auto max-w-[590px]">
                    <FadeInUpDiv>
                        <img
                            src={_PATH_SOURCES + data.icon}
                            alt="Icono sucursal"
                            className="mx-auto mb-7 hidden w-full max-w-max md:block"
                        />
                        <img
                            src={_PATH_SOURCES + data.icon_movil}
                            alt="Icono sucursal"
                            className="mx-auto mb-7 w-auto max-w-[600px] md:hidden"
                        />
                        <Text parseHtml={true}>
                            {i18n.language == "es" ? data.descEs : data.descEn}
                        </Text>

                        <hr className="my-8" />
                        <IframeManager
                            reserva_iframe={data.script_covermanager}
                        />
                        <hr className="my-8" />

                        <Text.Subtitle>{t("sucursal.horarios")}</Text.Subtitle>
                        <Text
                            className={"mb-2 tracking-[1.6px]"}
                            parseHtml={true}
                        >
                            {i18n.language == "es"
                                ? data.horarioEs
                                : data.horarioEn}
                        </Text>

                        {data.urlIn || data.urlFb || data.titleIn || (
                            <div className="mb-8 flex items-center justify-center">
                                {data.urlIn && (
                                    <a
                                        href={data.urlIn}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        <FaInstagram className="text-base lg:text-2xl" />
                                    </a>
                                )}
                                {data.urlFb && (
                                    <a
                                        href={data.urlFb}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        <FaFacebookF className="text-base lg:text-2xl" />
                                    </a>
                                )}
                                {data.titleIn && (
                                    <a
                                        href={data.urlIn}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        <Text className={"tracking-[1.6px]"}>
                                            {data.titleIn}
                                        </Text>
                                    </a>
                                )}
                            </div>
                        )}

                        <div className="mx-auto grid grid-cols-4 justify-center gap-1 py-5 sm:max-w-none sm:justify-center sm:gap-2 ">
                            {/* {data.menu && ( */}
                            {true && (
                                <Button.TransparentWhite
                                    isLink={true}
                                    isLinkExternal={true}
                                    url={_PATH_SOURCES + data.menu}
                                    className="col-span-1 mb-2 px-0 py-2.5 text-[10px] sm:mb-0 md:text-xs"
                                >
                                    {t("sucursal.btn.menu")}
                                </Button.TransparentWhite>
                            )}
                            {/* {data.urlDelivery && ( */}
                            {true && (
                                <Button.TransparentWhite
                                    isLink={true}
                                    isLinkExternal={true}
                                    url={data.urlDelivery}
                                    className="col-span-1 mb-2 px-0 py-2.5 text-[10px] sm:mb-0 md:text-xs"
                                >
                                    {t("sucursal.btn.delivery")}
                                </Button.TransparentWhite>
                            )}
                            {/* {data.urlReservation && ( */}
                            {true && (
                                <Button.TransparentWhite
                                    isLink={true}
                                    isLinkExternal={true}
                                    url={data.urlReservation}
                                    className="col-span-1 mb-2 px-0 py-2.5 text-[10px] sm:mb-0 md:text-xs"
                                >
                                    {t("sucursal.btn.reserva")}
                                </Button.TransparentWhite>
                            )}
                            {/* {data.urlLocation && ( */}
                            {true && (
                                <Button.TransparentWhite
                                    isLink={true}
                                    isLinkExternal={true}
                                    url={data.urlLocation}
                                    className="col-span-1 mb-2 px-0 py-2.5 text-[10px] sm:mb-0 md:text-xs"
                                >
                                    {t("sucursal.btn.ubicacion")}
                                </Button.TransparentWhite>
                            )}
                        </div>
                    </FadeInUpDiv>
                </main>

                <footer className="mx-auto max-w-[590px] pt-8">
                    <FadeInUpDiv>
                        {data?.address && (
                            <div className="mb-10 border-y border-y-white py-3">
                                <Text className={"tracking-[1.6px]"}>
                                    {data.address}
                                </Text>
                            </div>
                        )}
                        {data?.croquisEs && (
                            <figure>
                                {i18n.language == "es" ? (
                                    <img
                                        className="mx-auto"
                                        src={_PATH_SOURCES + data.croquisEs}
                                        alt="Croquis o mapa"
                                    />
                                ) : (
                                    <img
                                        className="mx-auto"
                                        src={_PATH_SOURCES + data.croquisEn}
                                        alt="Croquis o mapa"
                                    />
                                )}
                            </figure>
                        )}
                    </FadeInUpDiv>
                </footer>
            </article>
        </section>
    );
}

const IframeManager = ({ reserva_iframe }) => {
    if (!reserva_iframe) return null;

    return (
        <div>
            <div className="min-h-[450px]">{parse(reserva_iframe)}</div>
        </div>
    );
};
