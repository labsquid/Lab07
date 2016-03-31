<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <div>
            <h2>Timetable, based on day centric data</h2>
            <xsl:call-template name="timetable"/>
        </div>
    </xsl:template>

    <xsl:template name="timetable">
        <table>
            <tr>
                <th></th>
                <th>8:30</th>
                <th>9:30</th>
                <th>10:30</th>
                <th>11:30</th>
                <th>12:30</th>
                <th>13:30</th>
                <th>14:30</th>
                <th>15:30</th>
                <th>16:30</th>
                <th>17:30</th>

            </tr>
            <xsl:for-each select="/timetable/day">
                <xsl:call-template name="day_row"/>
            </xsl:for-each>
        </table>
    </xsl:template>
    <xsl:template name="day_row">
            <tr>
                <th>
                    <xsl:value-of select="./@day" />
                </th>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./timeslot/@time = '8:30'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./timeslot/@time = '9:30'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./timeslot/@time = '10:30'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./timeslot/@time = '11:30'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./timeslot/@time = '12:30'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./timeslot/@time = '13:30'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./timeslot/@time = '14:30'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./timeslot/@time = '15:30'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./timeslot/@time = '16:30'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
                <td>
                    <xsl:for-each select="./booking">
                            <xsl:if test="./timeslot/@time = '17:30'">
                                <xsl:value-of select="./course/@course" />
                            </xsl:if>
                    </xsl:for-each>
                </td>
            </tr>
    </xsl:template>
</xsl:stylesheet>
