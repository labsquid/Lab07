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
            <xsl:for-each select="/timetable/timeslot">
                <xsl:call-template name="timeslot_row"/>
            </xsl:for-each>
        </table>
    </xsl:template>
    <xsl:template name="timeslot_row">
            <tr>
                <th>
                    <xsl:value-of select="./@time" />
                </th>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./day/@day = 'Monday'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./day/@day = 'Tuesday'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./day/@day = 'Wednesday'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./day/@day = 'Thursday'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./day/@day = 'Friday'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
            
            </tr>
    </xsl:template>
</xsl:stylesheet>
