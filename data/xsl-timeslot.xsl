<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <div>
            <h2>Timetable, based on timeslot centric data</h2>
            <xsl:call-template name="timetable"/>
        </div>
    </xsl:template>

    <xsl:template name="timetable">
        <table>
            <tr>
                <th></th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
            <xsl:for-each select="/schedule/origin/destination[@code='YYC']/flight">
                <xsl:sort select="@arrive"/>
                <xsl:call-template name="arrival_flight"/>
            </xsl:for-each>
        </table>
    </xsl:template>
