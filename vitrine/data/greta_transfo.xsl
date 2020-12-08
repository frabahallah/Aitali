<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<html>
			<head>
				<meta charset="utf-8" />
				<title>A partir d'un XML</title>
				<link rel="stylesheet" type="text/css" href="../css/main.css" />
			</head>
			<body>
				<h1>
					<xsl:value-of select="stage/session/intitule" />
					du
					<xsl:value-of select="stage/session/debut" />
					au
					<xsl:value-of select="stage/session/fin" />
				</h1>
				<h2>Salle de formation</h2>
				<span>N° de la salle : </span>
				<xsl:value-of select="//salle/@no" />
				<br />
				<span>Cafetière : </span>
				<xsl:choose>
					<xsl:when test="//cafetiere='false'">
						Y'a pas !
					</xsl:when>
					<xsl:otherwise>
						Oui ;o)
					</xsl:otherwise>
				</xsl:choose>
				<br />
				<span>Imprimante : </span>
				<xsl:choose>
					<xsl:when test="//printer='false'">
						Y'a pas !
					</xsl:when>
					<xsl:otherwise>
						Oui ;o)
					</xsl:otherwise>
				</xsl:choose>
				<br />
				<span>PC utilisés (%) : </span>
				<meter min="0" max="16" value="13" />
				<h2>Participants</h2>
				<table class="waow">
					<thead>
						<tr>
							<th>Poste</th>
							<th>Prénom</th>
							<th>Arrivée</th>
						</tr>
					</thead>
					<tbody>
						<xsl:for-each select="stage/participants/contact">
							<tr>
								<td>
									<xsl:value-of select="poste" />
								</td>
								<td>
									<xsl:value-of select="prenom" />
								</td>
								<td>
									<xsl:value-of select="date_entree" />
								</td>
							</tr>
						</xsl:for-each>
					</tbody>
				</table>
				<h2>Intervenants</h2>
				<ol>
					<xsl:for-each select="stage/intervenants/contact">
						<li>
							<xsl:value-of select="prenom" />
							<ul>
								<xsl:for-each select="matieres/matiere">
									<li>
										<xsl:value-of select="." />
									</li>
								</xsl:for-each>
							</ul>
						</li>
					</xsl:for-each>
				</ol>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>