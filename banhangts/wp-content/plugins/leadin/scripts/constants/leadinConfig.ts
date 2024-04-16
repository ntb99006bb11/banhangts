interface KeyStringObject {
  [key: string]: string;
}

interface Routes {
  [key: string]: string | KeyStringObject;
}

export type ContentEmbedDetails = {
  activated: boolean;
  installed: boolean;
  canActivate: boolean;
  canInstall: boolean;
  nonce: string;
};

interface LeadinConfig {
  accountName: string;
  adminUrl: string;
  activationTime: string;
  connectionStatus?: 'Connected' | 'NotConnected';
  deviceId: string;
  didDisconnect: '1' | '0';
  env: string;
  formsScript: string;
  meetingsScript: string;
  formsScriptPayload: string;
  hublet: string;
  hubspotBaseUrl: string;
  hubspotNonce: string;
  iframeUrl: string;
  impactLink?: string;
  leadinPluginVersion: string;
  leadinQueryParams: KeyStringObject;
  loginUrl: string;
  locale: string;
  phpVersion: string;
  pluginPath: string;
  plugins: KeyStringObject;
  portalDomain: string;
  portalEmail: string;
  portalId: number;
  redirectNonce: string;
  restNonce: string;
  restUrl: string;
  reviewSkippedDate: string;
  refreshToken?: string;
  theme: string;
  trackConsent?: boolean;
  wpVersion: string;
  contentEmbed: ContentEmbedDetails;
  requiresContentEmbedScope?: boolean;
}

const {
  accountName,
  adminUrl,
  activationTime,
  connectionStatus,
  deviceId,
  didDisconnect,
  env,
  formsScript,
  meetingsScript,
  formsScriptPayload,
  hublet,
  hubspotBaseUrl,
  hubspotNonce,
  iframeUrl,
  impactLink,
  leadinPluginVersion,
  leadinQueryParams,
  locale,
  loginUrl,
  phpVersion,
  pluginPath,
  plugins,
  portalDomain,
  portalEmail,
  portalId,
  redirectNonce,
  restNonce,
  restUrl,
  refreshToken,
  reviewSkippedDate,
  theme,
  trackConsent,
  wpVersion,
  contentEmbed,
  requiresContentEmbedScope,
}: //@ts-expect-error global
LeadinConfig = window.leadinConfig;

export {
  accountName,
  adminUrl,
  activationTime,
  connectionStatus,
  deviceId,
  didDisconnect,
  env,
  formsScript,
  meetingsScript,
  formsScriptPayload,
  hublet,
  hubspotBaseUrl,
  hubspotNonce,
  iframeUrl,
  impactLink,
  leadinPluginVersion,
  leadinQueryParams,
  loginUrl,
  locale,
  phpVersion,
  pluginPath,
  plugins,
  portalDomain,
  portalEmail,
  portalId,
  redirectNonce,
  restNonce,
  restUrl,
  refreshToken,
  reviewSkippedDate,
  theme,
  trackConsent,
  wpVersion,
  contentEmbed,
  requiresContentEmbedScope,
};
